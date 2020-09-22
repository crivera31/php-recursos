$(function() {
    $("#estado").on("change", function() {
        let id = $('#id_p').val();
        let estado = $('#estado').val();
        $.ajax({
            url: "procesos/update_estado.php",
            type: "POST",
            data: { id,estado },
            cache: false
          })
            .done(function(response) {
                alert('Estado cambiado a: ' +response);
            })
            .fail(function(XMLHttpRequest, textStatus, errorThrown) {
              console.log("Status: " + textStatus + " Error: " + errorThrown);
            });
    });
});