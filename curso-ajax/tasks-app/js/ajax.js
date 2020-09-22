$(function() {
  let edit = false;
  console.log("jquery is oprative");
  $("#task-result").hide();
  fecthTask();

  // $('#formBuscar').submit(function(e) {
  //   e.preventDefault(); //cancelar la recarga de la pag. como es form
  //   console.log('me diste un click...');
  // });

  $("#search").keyup(function(e) {//keyup es cuando el user ha presionado una tecla
    if ($("#search").val()) { //si tiene un valor haga la busqueda
      var dato = new FormData(formBuscar);
      console.log(dato.get("search"));

      fetch("assets/task-search.php", {
        method: "POST",
        body: dato
      })
        .then(function(response) {
          // console.log(response);
          if (response.status !== 200) {
            console.log(
              "Looks like there was a problem. Status Code: " + response.status
            );
            return;
          }
          response.json().then(function(data) {
            console.log(data);
            let template = "";
            data.forEach(data => {
              template += `<li> 
                        ${data.name} 
                    </li>`;
            });
            $("#container").html(template);
            $("#task-result").show();
          });
        })
        .catch(function(err) {
          console.log("Fetch Error: ", err);
        });
    }
  });

  $('#taskForm').submit(function(e) {
    e.preventDefault(); //cancelar la recarga de la pag. como es form
    console.log('me diste un click');

    var datos = new FormData(taskForm);
    console.log(datos.get('name'));
    console.log(datos.get('description'));
    // console.log(datos.get('taskId'));

    let url = edit === false ? 'assets/task-add.php' : 'assets/task-edit.php';
    fetch(url, {
        method: 'POST',
        body: datos
      })
        .then(function(response) {
            // console.log(response);
          if (response.status !== 200) {
            console.log("Looks like there was a problem. Status Code: " + response.status);
            return;
          }
          // Examine the text in the response
          response.text().then(function(data) {
            console.log(data);
            fecthTask();
            $('#taskForm').trigger('reset'); //resetear el form
          });
        })
        .catch(function(err) {
          console.log("Fetch Error: ", err);
        });
});

  function fecthTask() {
    fetch("assets/task-list.php", {
      method: "GET"
    })
      .then(function(response) {
        if (response.status !== 200) {
          console.log(
            "Looks like there was a problem. Status Code: " + response.status
          );
          return;
        }
        // Examine the text in the response
        response.json().then(function(data) {
          console.log(data);
          let template = "";
          data.forEach(data => {
            template += `
            <tr taskId="${data.id}">
                <td>${data.id}</td>
                <td>
                    <a href="#" class="task-item">${data.name}</a>
                </td>
                <td>${data.description}</td>
                <td>
                    <button class="task-delete btn btn-danger btn-sm" >
                    delete
                    </button>
                </td>
            </tr>`;
          });
          $("#tasks").html(template);
        });
      })
      .catch(function(err) {
        console.log("Fetch Error: ", err);
      });
  }

  $(document).on('click','.task-delete',function(){
    if (confirm('Are you sure you  want to delete it?')) {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('taskId');
        
        console.log(element);
        console.log(id);

        const data = new FormData();
        data.append('id', id);

        fetch('assets/task-delete.php', {
          method: 'POST',
          body: data
        })
          .then(function(response) {
              console.log(response);
            if (response.status !== 200) {
              console.log("Looks like there was a problem. Status Code: " + response.status);
              return;
            }
            // Examine the text in the response
            response.text().then(function(data) {
              console.log(data);
              // $(element).hide(1000);
              fecthTask();
            });
          })
          .catch(function(err) {
            console.log("Fetch Error: ", err);
          });
    }
  });
});
