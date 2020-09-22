$(function() {
  var tablaDoc = $("#TablaDoc").DataTable({
    pageLength: 5,
    lengthMenu: [[3, 5, 10, -1], [3, 5, 10, "All"]],
    order: [[0, "asc"]],
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

  var tablaUser = $("#TablaUser").DataTable({
    pageLength: 5,
    lengthMenu: [[3, 5, 10, -1], [3, 5, 10, "All"]],
    order: [[0, "asc"]],
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

  var tablaInstituciones = $("#TablaInstituciones").DataTable({
    pageLength: 5,
    lengthMenu: [[3, 5, 10, -1], [3, 5, 10, "All"]],
    order: [[0, "asc"]],
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

  // View_all_docentes();
  function View_all_docentes(var1){
    $.ajax({
      url: "admin/view_all_docentes.php",
      type: "POST",
      data: { var1 },
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        let template = "";
        var cont = 0;

        data.forEach(data => {
          cont++;
          template += `<tr>
                        <td>${cont}</td>
                        <td>${data.nombre}</td>
                        <td>${data.a_paterno}</td>
                        <td>${data.a_materno}</td>
                        </tr>`;
                      });
                      // <td>
                      //   <a href="javascript:void(0)" id="" class="btn btn-secondary btn-sm" data-id="${data.id}" data-toggle="modal" data-target="#ModalRegHoras" data-backdrop="static" data-keyboard="false">Ver info</a>
                      // </td>
        tablaDoc.destroy();
        $("#TablaDoc tbody").html(template);

        tablaDoc = $("#TablaDoc").DataTable({
          //para modal ver secciones
          pageLength: 5,
          lengthMenu: [[3, 5, 10, -1], [3, 5, 10, "All"]],
          order: [[0, "asc"]],
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
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }

  View_all_instituciones();
  function View_all_instituciones(){
    $.ajax({
      url: "admin/view_all_instituciones.php",
      type: "GET",
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        let template = "";
        var cont = 0;

        data.forEach(data => {
          cont++;
          template += `<tr>
                        <td>${cont}</td>
                        <td>${data.nombre}</td>
                        <td>${data.direccion}</td>
                        <td>${data.niveles}</td>
                        </tr>`;
                        // <td>
                        //   <a href="javascript:void(0)" id="" class="btn btn-secondary btn-sm" data-id="${data.id}" data-toggle="modal" data-target="#ModalRegHoras" data-backdrop="static" data-keyboard="false">Ver info</a>
                        // </td>
        });
        tablaInstituciones.destroy();
        $("#TablaInstituciones tbody").html(template);

        tablaInstituciones = $("#TablaInstituciones").DataTable({
          //para modal ver secciones
          pageLength: 5,
          lengthMenu: [[3, 5, 10, -1], [3, 5, 10, "All"]],
          order: [[0, "asc"]],
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
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }
  Cargar_instituciones_todas();

  function Cargar_instituciones_todas() {
    $.ajax({
      url: "admin/view_all_instituciones.php",
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
        $("#selectVerInst").append(template);
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }
  let var1;
  $("#selectVerInst").on("change", function() {
    var1 = $(this).val();
    View_all_docentes(var1);
  });
  //registrar usuario
  $("#formRegUser").submit(function(e) {
    let usuario = $('#user').val();
    let clave = $('#clave').val();
    $.ajax({
      url: "admin/reg_user.php",
      type: "POST",
      data: { usuario, clave },
      cache: false
    })
      .done(function(response) {
        let msj = '';
        if (response == 'error1') {
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
        } else if(response == 'user_existente'){
          msj = `<div class='alert alert-danger no-border mb-2' role='alert'>
                  <strong>El usuario ya existe.</strong>
                </div>`;
        } else if(response == 'success'){
          msj = `<div class='alert alert-success no-border mb-2' role='alert'>
                  <strong>Usuario agregado.</strong>
                </div>`;
        }
        $('#notificacion').html(msj);
        $('#formRegUser').trigger("reset");
        View_all_usuarios();
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
    e.preventDefault();
  });

  $(document).on("click", "#CerrarRegUser", function() { //quitar el msj de error
    $('#notificacion').html('');
  });
  View_all_usuarios();
  function View_all_usuarios(){
    $.ajax({
      url: "admin/view_all_users.php",
      type: "GET",
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        // console.log(data);
        let template = "";
        var cont = 0;
        let nombre = "";
        let apaterno = "";
        let amaterno = "";

        data.forEach(data => {
          cont++;
          if (data.nombre == null ) {
            nombre = `<td>--</td>`;
          } else {
            nombre = `<td>${data.nombre}</td>`;
          }

          if (data.apaterno == null ) {
            apaterno = `<td>--</td>`;
          } else {
            apaterno = `<td>${data.apaterno}</td>`;
          }

          if (data.amaterno == null ) {
            amaterno = `<td>--</td>`;
          } else {
            amaterno = `<td>${data.amaterno}</td>`;
          }
          template += `<tr rowID="${data.id}">
                        <td>${cont}</td>
                        <td>${data.usuario}</td>`
                        + nombre + apaterno + amaterno+`
                        <td>
                        <button class="user-editar btn btn-outline-info btn-sm" data-id="${data.id}" data-toggle="modal" data-target="#ModalEditUsuario" data-backdrop="static" data-keyboard="false">
                            Editar
                        </button>
                        <button class="user-delete btn btn-outline-danger btn-sm" >
                            Eliminar
                        </button>
                        </td>
                        </tr>`;
        });
        // console.log(template);
        tablaUser.destroy();
        $("#TablaUser tbody").html(template);

        tablaUser = $("#TablaUser").DataTable({
          //para modal ver secciones
          pageLength: 5,
          lengthMenu: [[3, 5, 10, -1], [3, 5, 10, "All"]],
          order: [[0, "asc"]],
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
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }

  $(document).on('click','.user-delete',function(){
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('rowID');
        // console.log('TR: ' ,element);
        // console.log(id)
        Swal.fire({
          title: "Desea eliminar el usuario ?",
          text: "¡No podrás revertir la acción!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Si"
        }).then(function(check) {
          if (check.value) {
            $.ajax({
              url: "procesos/delete-user.php",
              method: "POST",
              data: { id },
              cache: false,
              success: function(response) {
                if (response == "exito") {
                  // Swal.fire("Deleted!", "Your file has been deleted.", "success");
                  $(element).hide(1000);
                  View_all_usuarios();
                }
              }
            });
          }
        });

  });
  let indice_user;
  $(document).on("click", ".user-editar", function() {
    indice_user = $(this).data("id");
    $.ajax({
      url: "procesos/traer_user.php",
      type: "POST",
      data: { indice_user },
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        $("#c_user").val(data.usuario);
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  });

  $("#formUsuarioEditar").submit(function(e) {
    let user = $("#c_user").val();
    let id = indice_user;
    $.ajax({
      url: "procesos/editar_user.php",
      type: "POST",
      data: { user,id},
      cache: false
    })
      .done(function(response) {
        console.log(response)
        if (response == 'actualizado') {
          Notificacion_userEdit(response);
          View_all_usuarios();
        } else if(response == 'llenar_campos') {
          Notificacion_userEdit(response);
        }
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
    e.preventDefault();
  });
  function Notificacion_userEdit(msj) {
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
    if (msj == "actualizado") {
      toastr.success('Dato actualizado.');
    } else if(msj == "llenar_campos") {
      toastr.error('No puede ingresar datos en blanco.');
    }
  }

});