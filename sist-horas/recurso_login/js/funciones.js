$(function() {
  console.log("jquery is oprative");

  $("#formLogin").submit(function(e) {
    // console.log("hizo click");
    let user = $("#user").val();
    let pass = $("#pass").val();
    console.log(user + ' - ' + user.length);
    $.ajax({
      url: "proceso/logueo.php",
      type: "POST",
      data: { user, pass },
      cache: false,
      success: function(response) {
        console.log(response);
        if (response == "llenar_campos") {
          Notication(response);
        } else if (response == "datos_incorrectos") {
          Notication(response);
        } else {
          location.href = "siugels"; //si estado=completado entra al sistema
        }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      }
    });
    e.preventDefault();
  });
  function Notication(msj) {
    toastr.options = {
      closeButton: false,
      debug: false,
      newestOnTop: false,
      progressBar: false,
      preventDuplicates: false,
      onclick: null,
      showDuration: "400",
      hideDuration: "1000",
      timeOut: "5000",
      extendedTimeOut: "1000",
      showEasing: "swing",
      hideEasing: "linear",
      showMethod: "show",
      hideMethod: "hide"
    };
    if (msj == "llenar_campos") {
      toastr.error('Llene todos los campos.');
    } else if(msj == 'datos_incorrectos'){
      toastr.error('Usuario o contraseña incorrectos.');
    }    
  }
  //reset password
  $("#formResetPassword").submit(function(e) {
    let nueva_pass = $('#nueva_pass').val();
    let confirma_pass = $('#confirma_pass').val();
    let mi_user = $('#mi_user').val();

    $.ajax({
      url: "proceso/reset_password.php",
      type: "POST",
      data: { nueva_pass, confirma_pass, mi_user},
      cache: false
    })
      .done(function(response) {
        console.log(response);
        let msj = '';
        if (response == 'no_coinciden') {
          msj = `<div class='alert alert-danger no-border mb-2' role='alert'>
                 <strong>Las contraseñas no coinciden.</strong>
                </div>`;
        } else if (response == 'error1') {
          msj = `<div class='alert alert-danger no-border mb-2' role='alert'>
                 <strong>La clave debe tener al menos 6 caracteres.</strong>
                </div>`;
        } else if(response == 'error2') {
          msj = `<div class='alert alert-danger no-border mb-2' role='alert'>
                  <strong>La clave no puede tener más de 16 caracteres.</strong>
                </div>`;
        } else if(response == 'error3') {
          msj = `<div class='alert alert-danger no-border mb-2' role='alert'>
                  <strong>La clave debe tener al menos una letra mayúscula.</strong>
                </div>`;
        } else if(response == 'no_existe'){
          msj = `<div class='alert alert-danger no-border mb-2' role='alert'>
                  <strong>El usuario no esta registrado.</strong>
                </div>`;
        } else if(response == 'success'){
          msj = `<div class='alert alert-success no-border mb-2' role='alert'>
                  <strong>Su contraseña ha sido reseteada.</strong>
                </div>`;
        }
        $('#msj_reset').html(msj);
        $('#formResetPassword').trigger("reset");
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
