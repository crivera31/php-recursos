$(function() {

  $("#wizard").steps();
  $("#formRegPracticante")
    .steps({
      bodyTag: "fieldset",
      onStepChanging: function(event, currentIndex, newIndex) {
        // Always allow going backward even if the current step contains invalid fields!
        if (currentIndex > newIndex) {
          return true;
        }

        // Forbid suppressing "Warning" step if the user is to young
        if (newIndex === 3 && Number($("#age").val()) < 18) {
          return false;
        }

        var form = $(this);

        // Clean up if user went backward before
        if (currentIndex < newIndex) {
          // To remove error styles
          $(".body:eq(" + newIndex + ") label.error", form).remove();
          $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
        }

        // Disable validation on fields that are disabled or hidden.
        form.validate().settings.ignore = ":disabled,:hidden";

        // Start validation; Prevent going forward if false
        return form.valid();
      },
      onStepChanged: function(event, currentIndex, priorIndex) {
        // Suppress (skip) "Warning" step if the user is old enough.
        if (currentIndex === 2 && Number($("#age").val()) >= 18) {
          $(this).steps("Siguiente");
        }

        // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
        if (currentIndex === 2 && priorIndex === 3) {
          $(this).steps("previous");
        }
      },
      onFinishing: function(event, currentIndex) {
        var form = $(this);

        // Disable validation on fields that are disabled.
        // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
        form.validate().settings.ignore = ":disabled";

        // Start validation; Prevent form submission if false
        return form.valid();
      },
      onFinished: function(event, currentIndex) {
        var form = $(this);

        // Submit form input
        form.submit();
        console.log("guardandooo");
      }
    })
    .validate({
      errorPlacement: function(error, element) {
        element.before(error);
      }
    });

  var tabla_practicante = $("#tbl_practicante").DataTable({
    pageLength: 5,
    lengthMenu: [[3, 5, 10, -1], [3, 5, 10, "All"]],
    order: [[0, "asc"]],
    responsive: true,
    dom:
      '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"pull-left"i>>><"pull-right"p>',
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior"
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente"
      }
    }
  });
  //regi pract.
  $("#formRegPracticante").submit(function(e) {
    let datos = $("#formRegPracticante").serialize();
    console.log(datos);
    $.ajax({
      url: "proceso/add_practicante.php",
      type: "POST",
      data: datos,
      cache: false
    })
      .done(function(response) {
        if (response == "llenar_campos") {
          Notificacion(response);
        } else if (response == "agregado") {
          Notificacion(response);
          $("#formRegPracticante").trigger("reset");
        }
        Motrar_practicante();
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
    e.preventDefault();
  });
  function Notificacion(msj){
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
    if (msj == 'llenar_campos') {
      toastr.error('No puede ingresar datos en blanco.');
    } else if(msj == 'agregado'){
      toastr.success('Datos guardados.');
    }
  }
  Motrar_practicante();
  function Motrar_practicante() {
    $.ajax({
      url: "proceso/mostrar_practicantes.php",
      type: "GET",
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        var cont = 0;
        let template = "";
        data.forEach(data => {
          cont++;
          template += `<tr>
                        <td>${cont}</td>
                        <td>${data.nombre}</td>
                        <td>${data.ape_paterno}</td>
                        <td>${data.ape_materno}</td>
                        <td>
                          <a href="javascript:void(0)" id="infoPrac" title="Ver info" data-id="${data.id}" data-toggle="modal" data-target="#ModalInfoPract" data-backdrop="static" data-keyboard="false">
                          <i class="fa fa-eye text-navy"></i></a>
                        </td>
                        </tr>`;
        });
        tabla_practicante.destroy();
        $("#tbl_practicante tbody").html(template);
        tabla_practicante = $("#tbl_practicante").DataTable({
          pageLength: 5,
          lengthMenu: [[3, 5, 10, -1], [3, 5, 10, "All"]],
          order: [[0, "asc"]],
          dom:
            '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"pull-left"i>>><"pull-right"p>',
          language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo:
              "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty:
              "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
              sFirst: "Primero",
              sLast: "Último",
              sNext: "Siguiente",
              sPrevious: "Anterior"
            },
            oAria: {
              sSortAscending:
                ": Activar para ordenar la columna de manera ascendente",
              sSortDescending:
                ": Activar para ordenar la columna de manera descendente"
            }
          }
        });
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }
  //validar
  $(".letras").bind("keypress", function(event) {
    //solo ingresar letras
    var regex = new RegExp("^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$");
    var key = String.fromCharCode(
      !event.charCode ? event.which : event.charCode
    );
    if (!regex.test(key)) {
      event.preventDefault();
      return false;
    }
  });
  $(".numeros").keydown(function(event) {
    if (event.shiftKey) {
      event.preventDefault();
    }

    if (event.keyCode == 46 || event.keyCode == 8) {
    } else {
      if (event.keyCode < 95) {
        if (event.keyCode < 48 || event.keyCode > 57) {
          event.preventDefault();
        }
      } else {
        if (event.keyCode < 96 || event.keyCode > 105) {
          event.preventDefault();
        }
      }
    }
  });
  $(document).on("click", "#Cerrar", function() {
    var validator = $("#formRegPracticante").validate();
    validator.submitted = {};
    validator.prepareForm();
    validator.hideErrors();
    $(".error").removeClass("error");
  });
  //ver informacion
  let id;
  $(document).on("click", "#infoPrac", function() {
    id = $(this).data("id");
    Ver_info_practicante(id);
  });
  function Ver_info_practicante(id) {
    $.ajax({
      url: "proceso/info_practicante.php",
      type: "POST",
      data: { id },
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        $("#nombres_p").val(data.nombre);
        $("#ap_paterno_p").val(data.a_paterno);
        $("#ap_materno_p").val(data.a_materno);
        $("#direccion_p").val(data.direccion);
        $("#dni_p").val(data.dni);
        $("#correo_p").val(data.correo);
        $("#telefono_p").val(data.telefono);
        $("#ubicacion_p").val(data.ubicacion);
        $("#pedido_p").val(data.pedido);
        $("#documento_p").val(data.documentos);
        $("#fecha_p").val(data.fecha);
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }
  //inicio de pract.
  $("#name").select2({
    placeholder: "-- Seleccione --"
  });
  //cargar select con nombres
  Nombres();
  function Nombres() {
    $.ajax({
      url: "proceso/mostrar_nombres.php",
      type: "GET",
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        let template = "";
        data.forEach(data => {
          template += `<option value="${data.id}"> 
                            ${data.nombre} 
                      </option>`;
        });
        $("#name").append(template);
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }
  let id_nombre;
  $("#name").on("change", function() {
    id_nombre = $(this).val();
    Apellidos(id_nombre);
  });
  function Apellidos(id_nombre) {
    $.ajax({
      url: "proceso/mostrar_apellidos.php",
      type: "POST",
      data: { id_nombre },
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        $("#paterno_ape").val(data.ap_paterno);
        $("#materno_ape").val(data.ap_materno);
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }
  $("#data_2 .input-group.date").datepicker({
    startView: 3,
    todayBtn: "linked",
    keyboardNavigation: false,
    forceParse: false,
    autoclose: true,
    format: "dd/mm/yyyy"
  });
  //tabla de inicio y final practicas
  var tbl_iniciar = $("#tbl_iniciar").DataTable({
    pageLength: 5,
    lengthMenu: [[3, 5, 10, -1], [3, 5, 10, "All"]],
    order: [[0, "asc"]],
    responsive: true,
    dom:
      '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"pull-left"i>>><"pull-right"p>',
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo:
        "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior"
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente"
      }
    }
  });
  $("#formInicioPract").submit(function(e) {
    let id = $('#name').val();
    let fecha_ini = $('#inicio').val();
    let fecha_fin = $('#final').val();
    $.ajax({
      url: "proceso/add_fechas.php",
      type: "POST",
      data: { id,fecha_ini,fecha_fin },
      cache: false
    })
      .done(function(response) {
        console.log(response);
        if (response == 'agregado') {
          Notificacion1(response);
        } else if(response == 'existe') {
          Notificacion1(response);
        }
        Motrar_fecha();
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });

    e.preventDefault();
  });
  function Notificacion1(msj){
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
    if (msj == 'agregado') {
      toastr.success('Inicio de práticas agregado');
    } else {
      toastr.error('Ya existe');
    }
  }
  Motrar_fecha();
  function Motrar_fecha() {
    $.ajax({
      url: "proceso/mostrar_fechas.php",
      type: "GET",
      cache: false
    })
    .done(function(response) {
      let data = JSON.parse(response);
      var cont = 0;
      let template = "", estado = "";
      data.forEach(data => {
        if (data.status == "retirado") {
          estado = `<td><span id="tipo" class="badge badge-danger">${data.status}</span></td>`;
        } else {
          estado = `<td><span id="tipo" class="badge badge-primary">${data.status}</span></td>`;
        }
        cont++;
        template += `<tr>
                        <th>${cont}</th>
                        <td>${data.nombre}</td>
                        <td>${data.ap_paterno}</td>
                        <td>${data.ap_materno}</td>
                        <td>${data.f_ini}</td>
                        <td>${data.f_fin}</td>`
                        + estado +
                        `</tr>`;
      });
      tbl_iniciar.destroy();
        $("#tbl_iniciar tbody").html(template);
        tbl_iniciar = $("#tbl_iniciar").DataTable({
          pageLength: 5,
          lengthMenu: [[3, 5, 10, -1], [3, 5, 10, "All"]],
          order: [[0, "asc"]],
          dom:
            '<"row view-filter"<"col-sm-12"<"pull-left"l><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"pull-left"i>>><"pull-right"p>',
          language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla",
            sInfo:
              "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty:
              "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
              sFirst: "Primero",
              sLast: "Último",
              sNext: "Siguiente",
              sPrevious: "Anterior"
            },
            oAria: {
              sSortAscending:
                ": Activar para ordenar la columna de manera ascendente",
              sSortDescending:
                ": Activar para ordenar la columna de manera descendente"
            }
          }
        });
    })
    .fail(function(XMLHttpRequest, textStatus, errorThrown) {
      console.log("Status: " + textStatus + " Error: " + errorThrown);
    });
  }
});
// select id, fecha_ini, fecha_fin, if (CURDATE() > fecha_fin,'no activo','activo') as estado
// from inicio_practicas