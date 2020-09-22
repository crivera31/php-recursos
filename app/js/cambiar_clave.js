$(function () {
    $("#formReset").submit(function(e) {
        let nueva_pass = $('#re_contra1').val();
        let confirma_pass = $('#re_contra2').val();
        let correo = $('#re_correo').val();

        $.ajax({
            url: "procesos/reset_password.php",
            type: "POST",
            data: { nueva_pass, confirma_pass, correo},
            cache: false
          })
            .done(function(response) {
              console.log(response);
              let msj = '';
              if (response == 'no_coinciden') {
                msj = `<div class='alert alert-danger no-border mb-2' role='alert'>
                       <strong>Las contraseñas no coinciden.</strong>
                      </div>`;
              } else if(response == 'no_existe'){
                msj = `<div class='alert alert-danger no-border mb-2' role='alert'>
                        <strong>El usuario no esta registrado.</strong>
                      </div>`;
              } else if(response == 'success'){
                msj = `<div class='alert alert-success no-border mb-2' role='alert'>
                        <strong>Su contraseña ha sido reseteada.</strong>
                      </div>`;
                      $('#formReset').trigger("reset");
              }
              $('#msj_reset').html(msj);
            })
            .fail(function(XMLHttpRequest, textStatus, errorThrown) {
              console.log("Status: " + textStatus + " Error: " + errorThrown);
            });
        e.preventDefault();
    });

    $(document).on("click", "#CerrarReset", function() {
      $('#msj_reset').html('');
    });
});