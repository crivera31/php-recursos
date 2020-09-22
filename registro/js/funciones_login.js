$(function() {
  $("#formLogin").submit(function(e) {
    let user = $("#user").val();
    let pass = $("#password").val();
    $.ajax({
      url: "proceso/logueo.php",
      type: "POST",
      data: { user, pass },
      cache: false,
      success: function(response) {
        if (response == "llenar_campos") {
          Notificacion("llenar_campos");
        } else if (response == "datos_incorrectos") {
          Notificacion("datos_incorrectos");
        } else {
          location.href = "sistema";
        }
      },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      }
    });
    e.preventDefault();
  });

  function Notificacion(msj) {
    let notify;
    if (msj == "llenar_campos") {
      notify = "Llene todos los campos.";
    } else if(msj == "datos_incorrectos") {
      notify = "Usuario o contraseña incorrectos.";
    }
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
    toastr.error(notify);
  }
});
