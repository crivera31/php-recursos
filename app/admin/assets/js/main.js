$(function () {
  $("#form_empresa").submit(function (e) {
    let form = $("#form_empresa").serialize();

    $.ajax({
      url: "procesos/update_empresa.php",
      type: "POST",
      data: form,
      cache: false
    })
      .done(function(response) {
        console.log(response)
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
    e.preventDefault();
  });

  $("#form_login").submit(function(e) {
    let form_logueo = $("#form_login").serialize();
    $.ajax({
      url: "procesos/logueo.php",
      type: "POST",
      data: form_logueo,
      cache: false
    })
      .done(function(response) {
        console.log(response);
        if(response == "success") {
          location.href = "panel.php";
        } else if (response == "datos_incorrectos") {
        Notificacion("datos_incorrectos");
        }
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
    e.preventDefault();
  });
  function ocultar() {
    setTimeout(function() {
      $("#msj_login div").fadeOut(1500);
    },3000);
  }
  function Notificacion(msj) {
    let notify;
    if (msj == "datos_incorrectos") {
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