$(function() {
    let edit = false;
    console.log('jquery is oprative');
    $('#task-result').hide();
    fecthTask();


    $('#search').keyup(function (e) { //keyup es cuando el user ha presionado una tecla 
        if ($('#search').val()) { //si tiene un valor haga la busqueda
            let search = $('#search').val();
            $.ajax({
                url: 'assets/task-search.php',
                type: 'POST', //porq se quiere enviar algo al serviodr SEARCH
                data: {search},
                success: function(response) {
                    let data = JSON.parse(response); //lo convierte a un json
                    // console.log(data);
                    let template = '';

                    data.forEach(data => {
                        template += `<li> 
                            ${data.name} 
                        </li>`
                    });
                    $('#container').html(template);
                    $('#task-result').show();
                }
            })
        }
    })

    $('#taskForm').submit(function(e) {
        // console.log('enviando');
        const postData = {
            name: $('#name').val(),
            description: $('#description').val(),
            id: $('#taskId').val()
        };

        let url = edit === false ? 'assets/task-add.php' : 'assets/task-edit.php';

        console.log(postData); //muestra los datos q envio en los input
        $.post(url, postData, function(response) {
            console.log(response);  //respuesta del servidor success
            fecthTask();
            $('#taskForm').trigger('reset'); //resetear el form
        });
        e.preventDefault(); //cancelar la recarga de la pag. como es form
    });

    function fecthTask(){
        $.ajax({
            url: 'assets/task-list.php',
            type: 'GET',
            success: function(response) {
                // console.log(response); //muestra toda la data
                let tasks = JSON.parse(response);
                console.log(response);
                let template = '';
                //seleccionamos la tabla por el id
                tasks.forEach(task => {
                    template += `
                        <tr taskId="${task.id}">
                            <td>${task.id}</td>
                            <td>
                                <a href="#" class="task-item">${task.name}</a>
                            </td>
                            <td>${task.description}</td>
                            <td>
                                <button class="task-delete btn btn-danger btn-sm" >
                                    delete
                                </button>
                            </td>
                        </tr>`
                });
                $('#tasks').html(template);
            }
        });
    }

    $(document).on('click','.task-delete',function(){
        if (confirm('Are you sure you  want to delete il?')) {
            let element = $(this)[0].parentElement.parentElement;
            let id = $(element).attr('taskId');
            console.log('TR: ' ,element);
            $.post('assets/task-delete.php',{id}, function(response) {
                console.log(response);
                $(element).hide(1000);
                // fecthTask();
            })
        }
    });

    $(document).on('click','.task-item', function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('taskId');
        // console.log(id);
        $.post('assets/task-single.php',{id}, function(response) {
            // console.log(response);
            const data = JSON.parse(response);
            $('#name').val(data.name);
            $('#description').val(data.description);
            $('#taskId').val(data.id)
            edit = true;
        })
    });
});