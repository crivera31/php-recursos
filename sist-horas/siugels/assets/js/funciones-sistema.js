$(function() {
  view_data_profile();
  mostrar_departamentos();
  mostrar_institucion();

  function view_data_profile() {
    $.ajax({
      url: "procesos/view_profile.php",
      type: "GET",
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        $("#usuario").val(data.usuario);
        $("#nombres").val(data.nombres);
        $("#ape_paterno").val(data.ape_paterno);
        $("#ape_materno").val(data.ape_materno);
        $("#correo").val(data.correo);
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }
  //actualizar info del director(user)
  $("#formProfile").submit(function(e) {
    let form = $("#formProfile").serialize();
    $.ajax({
      url: "procesos/update_profile.php",
      type: "POST",
      data: form,
      cache: false
    })
      .done(function(response) {
        if (response == 'update_exito') {
          Notificacion_profile(response);
        } else if(response == 'llenar_campos') {
          Notificacion_profile(response);
        }
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
    e.preventDefault();
  });
  function Notificacion_profile(msj) {
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
    if (msj == "update_exito") {
      toastr.success('Datos actualizados.');
    } else if(msj == "llenar_campos") {
      toastr.error('No puede ingresar datos en blanco.');
    }
  }
  //agregar institucion
  $("#formInst").submit(function(e) {
    let form = $("#formInst").serialize();
    // var text = $('#departamento option:selected').text();
    $.ajax({
      url: "procesos/add_inst.php",
      type: "POST",
      data: form,
      cache: false
    })
      .done(function(response) {
        if(response == 'llenar_campos') {
          Notificacion_addInst(response);
        } else if(response == 'agregado'){
          mostrar_institucion();
          Notificacion_addInst(response);
        } else if(response == 'falta_niveles'){
          Notificacion_addInst(response);
        } else if(response == 'existe'){
          Notificacion_addInst(response);
        }

        $('#formInst').trigger("reset");
        $("#departamento").val('').trigger('change');
        $("#provincia").val('').trigger('change');
        $("#distrito").val('').trigger('change');
        
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
    e.preventDefault();
  });
  $("#FormUpdateInst").submit(function(e) {
    let nom = $("#nom_inst").val();
    let direc = $("#direccion_inst").val();
    let ref = $("#referencia_inst").val();
    let telf = $("#telf_inst").val();
    let varID = colegioID;
    $.ajax({
      url: "procesos/update_inst.php",
      type: "POST",
      data: { nom,direc,ref,telf,varID},
      cache: false
    })
      .done(function(response) {
        console.log(response)
        if (response == 'actualizado') {
          Notificacion_UpdateInfoInst(response);
        } else if(response == 'llenar_campos') {
          Notificacion_UpdateInfoInst(response);
        }
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
    e.preventDefault();
  });
  function Notificacion_UpdateInfoInst(msj) {
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
      toastr.success('Información actualizada.');
    } else if(msj == "llenar_campos") {
      toastr.error('No puede ingresar datos en blanco.');
    }
  }
  function Notificacion_addInst(msj) {
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
    if (msj == "agregado") {
      toastr.success('Datos de la Institución agregada.');
    } else if(msj == "llenar_campos") {
      toastr.error('No puede ingresar datos en blanco.');
    } else if(msj == 'falta_niveles'){
      toastr.error('Selecciones niveles.');
    } else if(msj == 'existe'){
      toastr.error('Solo puede registrar a la institución que esta a cargo.');
    }
  }
  // departamentos provincias y distrito
  txt_Provincia = "-- Seleccione --";
  txt_Distrito = "-- Seleccione --";

  $("#provincia").attr("disabled", true);
  $("#distrito").attr("disabled", true);

  $("#departamento").change(function() {
    $("#provincia")
      .empty()
      .attr("disabled", false)
      .html(
        '<option value="" selected disabled>' + txt_Provincia + "</option>"
      );
  });

  $("#provincia").change(function() {
    $("#distrito")
      .empty()
      .attr("disabled", false)
      .html('<option value="" selected disabled>' + txt_Distrito + "</option>");
  });

  $("#departamento").select2({
    theme: "bootstrap4",
    width: "100%",
    placeholder: "-- Seleccione --"
  });

  $("#provincia").select2({
    theme: "bootstrap4",
    width: "100%",
    placeholder: "-- Seleccione --"
  });

  $("#distrito").select2({
    theme: "bootstrap4",
    width: "100%",
    placeholder: "-- Seleccione --"
  });

  let dato1;
  let dato2;

  function mostrar_departamentos() {
    $.ajax({
      url: "procesos/list_departamentos.php",
      type: "GET",
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        let template = "";

        data.forEach(data => {
          template += `<option value="${data.id}"> 
                            ${data.departamento} 
                      </option>`;
        });
        $("#departamento").append(template);
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }

  $("#departamento").on("change", function() {
    dato1 = $(this).val();
    mostrar_provincias(dato1);
  });

  function mostrar_provincias(dato1) {
    $.ajax({
      url: "procesos/list_provincias.php",
      type: "POST",
      data: { dato1 },
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        let template = "";

        data.forEach(data => {
          template += `<option value="${data.id}"> 
                            ${data.provincia} 
                      </option>`;
        });
        $("#provincia").append(template);
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }

  $("#provincia").on("change", function() {
    dato2 = $(this).val();
    mostrar_distritos(dato2);
  });

  function mostrar_distritos(dato2) {
    $.ajax({
      url: "procesos/list_distritos.php",
      type: "POST",
      data: { dato2 },
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        let template = "";

        data.forEach(data => {
          template += `<option value="${data.id}"> 
                          ${data.distrito} 
                    </option>`;
        });
        $("#distrito").append(template);
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }

  function mostrar_institucion() { //listar inst. x director
    $.ajax({
      url: "procesos/list_institucion.php",
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
                      <th scope="row">${cont}</th>
                      <td>${data.nombre}</td>
                      <td>${data.direccion}</td>
                      <td>${data.niveles}</td>
                      <td>
                            <div class="btn-group" role="group">
                              <button id="btnGroupVerticalDrop4" type="button" class="btn btn-secondary dropdown-toggle"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Acciones
                              </button>
                              <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                                <a class="dropdown-item" id="info_inst" href="javascript:void(0)" data-id="${data.id}" data-distrito="${data.distritoID}" data-toggle="modal" data-target="#ModalInfo" data-backdrop="static" data-keyboard="false"><i class="mr-1 icon-eye3"></i>  Ver info</a>

                                <a class="dropdown-item" id="secciones" href="javascript:void(0)" data-id="${data.id}" data-nivel="${data.niveles}" data-toggle="modal" data-target="#ModalSeccion" data-backdrop="static" data-keyboard="false">
                                <i class="mr-1 icon-sort-amount-asc"></i>  Ver las secciones</a>
                              </div>
                            </div>
                      </td>
                    </tr>`;
        });
        $("#tbl_inst").append(template);
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }

  //agregando secciones en modales
  let colegioID, separador, arrayNivel;

  $(document).on("click", "#secciones", function() {
    colegioID = $(this).data("id");
    listar_niveles_x_inst();
  });

  $(document).on("click", "#info_inst", function() {
    colegioID = $(this).data("id");
    let distrito_ID = $(this).data("distrito");
    ver_info_colegio(colegioID, distrito_ID);

  });
  function ver_info_colegio(colegioID,distrito_ID){
    let id_colegio = colegioID;
    let distritoID = distrito_ID;
    $.ajax({
      url: "procesos/view_info_inst.php",
      type: "POST",
      data: { id_colegio, distritoID },
      cache: false
    })
    .done(function(response) {
      let data = JSON.parse(response);
        $("#nom_inst").val(data.nombre);
        $("#direccion_inst").val(data.direccion);
        $("#referencia_inst").val(data.referencia);
        $("#niveles_inst").val(data.niveles);
        $('#telf_inst').val(data.telefono);
        let ubicacion = data.depart + '/' + data.provin + '/' + data.distr;
        $("#ubicacion_inst").val(ubicacion);
    })
    .fail(function(XMLHttpRequest, textStatus, errorThrown) {
      console.log("Status: " + textStatus + " Error: " + errorThrown);
    });
  }
  llenar_combo_niveles();
  function llenar_combo_niveles() {
    //en el modal al agregar los grados
    $.ajax({
      url: "procesos/list_niveles_x_inst.php",
      type: "GET",
      cache: false
    })
      .done(function(response) {
        separador = "-";
        arrayNivel = response.split(separador);
        let all_nivel = ['Inicial', 'Primaria', 'Secundaria'];
        let template = "";
          for (var i = 0; i < all_nivel.length; i++) {
            for (var j = 0; j < arrayNivel.length; j++) {
              if (arrayNivel[j] == all_nivel[i]) {
                template += '<option value="'+(i+1)+'">'+all_nivel[i]+'</option>';
              }
            }
          }
        $("#mis_niveles").append(template);
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }

  $("#seccion").submit(function(e) {
    // let form = $("#seccion").serialize();
    let grado = $("#nom_grado").val();
    let seccion = $("#nom_seccion").val();
    let nivel_id = $("#mis_niveles").val();
    let institucion_id = colegioID; // id de la institucion
    $.ajax({
      url: "procesos/add_secciones.php",
      type: "POST",
      data: { grado, seccion, nivel_id, institucion_id },
      cache: false
    })
      .done(function(response) {
        if(response == 'llenar_campos') {
              Notificacion_addSeccion(response);
        } else if(response == 'agregado'){
              Notificacion_addSeccion(response);
        } else if(response == 'seccion_existente'){
              Notificacion_addSeccion(response);
        }

        $('#seccion').trigger("reset");
        $('#mis_niveles').val($('#mis_niveles').find('option:first').val());
        listar_niveles_x_inst();
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });

    e.preventDefault();
  });
  function Notificacion_addSeccion(msj) {
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
    if (msj == "agregado") {
      toastr.success(' Sección agregada.');
    } else if(msj == "llenar_campos") {
      toastr.error('No puede ingresar datos en blanco.');
    } else if(msj == 'seccion_existente'){
      toastr.error('El grado y sección ya se registraron.');
    } 
  }
  /////////////////// MOSTRAR EN EL MODAL LISTA DE LOS NIVELES /////////////////////////
  var tbl_niveles = $("#TablaNiveles").DataTable({
    pageLength: 3,
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
  //////////////////////////////////

  function listar_niveles_x_inst(){
    let id_institucion = colegioID;
    $.ajax({
      url: "procesos/list_niveles.php",
      data: { id_institucion },
      type: "POST",
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        let template = "";

        data.forEach(data => {
          template += `<tr>
                        <td>${data.nivel}</td>
                        <td>${data.nombre}</td>
                        <td>${data.nom_seccion}</td>
                        </tr>`;
                      });
                      // <td>
                      //   <a href="javascript:void(0)" data-id="${data.id}" class="btn btn-secondary btn-sm"><i class="icon-trash-b"></i></a>
                      // </td>
        tbl_niveles.destroy();
        $("#TablaNiveles tbody").html(template);
        tbl_niveles = $("#TablaNiveles").DataTable({
          //para modal ver secciones
          pageLength: 3,
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

   //validarcion de inputs
   $(".numeros").keydown(function (event) { //solo ingresar numeros en el dni
    if (event.shiftKey) {
      event.preventDefault();
    }
    if (event.keyCode == 46 || event.keyCode == 8) {
    }
    else {
      if (event.keyCode < 95) {
        if (event.keyCode < 48 || event.keyCode > 57) {
          event.preventDefault();
        }
      }
      else {
        if (event.keyCode < 96 || event.keyCode > 105) {
          event.preventDefault();
        }
      }
    }
  });

  $(".letras").bind('keypress', function(event) { //solo ingresar letras
    var regex = new RegExp("^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
      event.preventDefault();
      return false;
    }
  });
//añadir docente
  $("#formDocente").submit(function (e) {
    let form = $("#formDocente").serialize();

    $.ajax({
      url: "procesos/add_docente.php",
      type: "POST",
      data: form,
      cache: false
    })
      .done(function(response) {
        console.log(response);
        if(response == 'llenar_campos') {
              Notificacion_addDocente(response);
        } else if(response == 'docente_agregado') {
                Notificacion_addDocente(response);
        } else if(response == 'docente_existente') {
              Notificacion_addDocente(response);
        }

        $('#formDocente').trigger("reset");
        $('#n_grado').val($('#n_grado').find('option:first').val());
        $('#n_seccion').val("");
        listar_docentes_x_inst();
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });

    e.preventDefault();
  });
  function Notificacion_addDocente(msj) {
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
    if (msj == "docente_agregado") {
      toastr.success(' Docente agregado.');
    } else if(msj == "llenar_campos") {
      toastr.error('No puede ingresar datos en blanco.');
    } else if(msj == 'docente_existente'){
      toastr.error('Ya hay docente agregado con el grado y sección.');
    } 
  }
  add_grado_x_docente();
  function add_grado_x_docente()
  {
    $.ajax({
      url: "procesos/add_grado_docente.php",
      type: "GET",
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        let template = "";

        data.forEach(data => {
          template += `<option value="${data.nombre}"> 
                          ${data.nombre} 
                    </option>`;
        });
        $("#n_grado").append(template);
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }

  let NomSeccion = "";
  $("#n_grado").on("change", function() {
    NomSeccion = $('#n_grado').val();
    $('#n_seccion').empty();
    add_nomsecciones_x_grado(NomSeccion);
  });

  function add_nomsecciones_x_grado(NomSeccion)
  {
    let SeccionNom = NomSeccion;
    $.ajax({
      url: "procesos/view_nomseccion_grado.php",
      type: "POST",
      data: { SeccionNom },
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        let template = "";

        data.forEach(data => {
          template += `<option value="${data.nombre}"> 
                          ${data.nombre} 
                    </option>`;
        });
        $("#n_seccion").append(template);

      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }

  var tbl_docentes = $("#TablaDocente").DataTable({
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
  
  listar_docentes_x_inst();
  function listar_docentes_x_inst(){
    $.ajax({
      url: "procesos/list_docente_x_inst.php",
      type: "GET",
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        var cont = 0;
        let template = "";

        data.forEach(data => {
          cont++;
          template += `<tr id-do="${data.id}">
                        <th>${cont}</th>
                        <td>${data.nombre}</td>
                        <td>${data.a_paterno}</td>
                        <td>${data.a_materno}</td>
                        <td>${data.dni}</td>
                        <td>
                            <div class="btn-group" role="group">
                            <button id="btnGroupVerticalDrop4" type="button" class="btn btn-secondary dropdown-toggle"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Acciones
                            </button>
                            <div class="dropdown-menu" aria-labelledby="btnGroupVerticalDrop1">
                              <a class="dropdown-item" id="info_docente" href="javascript:void(0)" data-id="${data.id}" data-toggle="modal" data-target="#ModalDocenteInfo" data-backdrop="static" data-keyboard="false"><i class="mr-1 icon-eye3"></i>  Ver info</a>

                              <a class="dropdown-item" id="delete-docente" href="javascript:void(0)" data-id="${data.id}" data-nivel="${data.niveles}"data-toggle="modal" data-target="#ModalSeccion" data-backdrop="static" data-keyboard="false">
                              <i class="mr-1 icon-bin"></i> Eliminar</a>
                            </div>
                          </div>
                        </td>
                      </tr>`;
        });
        tbl_docentes.destroy();
        $("#TablaDocente tbody").html(template);

        tbl_docentes = $("#TablaDocente").DataTable({
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
  $(document).on("click", "#delete-docente", function() {
    let element = $(this)[0].parentElement.parentElement.parentElement.parentElement; //obtenemos toda la fila(tr)
    let id = $(element).attr("id-do"); //id de cada tr segun el docente
    Swal.fire({
      title: "Desea eliminar el docente ?",
      text: "¡No podrás revertir la acción!",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Si"
    }).then(function(check) {
      if (check.value) {
        $.ajax({
          url: "procesos/delete_docente.php",
          method: "POST",
          data: { id },
          cache: false,
          success: function(response) {
            if (response == "true") {
              // Swal.fire("Deleted!", "Your file has been deleted.", "success");
              $(element).hide(1000);
              listar_docentes_x_inst();
            }
          }
        });
      }
    });
  });
  //info del docente
  let id_docente;
  $(document).on("click", "#info_docente", function() {
    id_docente = $(this).data("id");
    ver_info_docente(id_docente);

  });
  function ver_info_docente(id_docente){
    let docente_id = id_docente;
    $.ajax({
      url: "procesos/view_info_docente.php",
      type: "POST",
      data: { docente_id },
      cache: false
    })
    .done(function(response) {
      let data = JSON.parse(response);
        $("#nDocente").val(data.nombre);
        $("#apaterno").val(data.a_paterno);
        $("#amaterno").val(data.a_materno);
        $("#d_dni").val(data.dni);
        $("#d_hrs_programadas").val(data.hrs_progr);
        $("#d_jornada_laboral").val(data.jor_laboral);
        $("#grado_n").val(data.n_grado);
        $("#seccion_n").val(data.n_seccion);
    })
    .fail(function(XMLHttpRequest, textStatus, errorThrown) {
      console.log("Status: " + textStatus + " Error: " + errorThrown);
    });
  }
  $("#FormUpdateInfoDoc").submit(function(e) {
    // console.log(id_docente);
    let nom = $("#nDocente").val();
    let paterno = $("#apaterno").val();
    let materno = $("#amaterno").val();
    let dni= $("#d_dni").val();
    let hrs= $("#d_hrs_programadas").val();
    let jornada= $("#d_jornada_laboral").val();
    let grado= $("#grado_n").val();
    let seccion= $("#seccion_n").val();
    let varID = id_docente;
    $.ajax({
      url: "procesos/update_info_doc.php",
      type: "POST",
      data: { nom,paterno,materno,dni,hrs,jornada,grado,seccion,varID },
      cache: false
    })
    .done(function(response) {
      if (response == 'actualizado') {
        Notificacion_UpdateInfoDocente(response);
      } else if(response == 'llenar_campos') {
        Notificacion_UpdateInfoDocente(response);
      }
    })
    .fail(function(XMLHttpRequest, textStatus, errorThrown) {
      console.log("Status: " + textStatus + " Error: " + errorThrown);
    });
    e.preventDefault();
  });
  function Notificacion_UpdateInfoDocente(msj) {
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
      toastr.success('Datos actualizados.');
    } else if(msj == "llenar_campos") {
      toastr.error('No puede ingresar datos en blanco.');
    }
  }
  var tbl_docentesHoras = $("#TablaDocenteHoras").DataTable({
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

  listar_docentes_x_inst_horas();
  function listar_docentes_x_inst_horas(){
    $.ajax({
      url: "procesos/list_docente_x_inst.php",
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
                        <th>${cont}</th>
                        <td>${data.nombre}</td>
                        <td>${data.a_paterno}</td>
                        <td>${data.a_materno}</td>
                        <td>
                          <a href="#" id="RegHoras" class="btn btn-secondary btn-sm" data-id="${data.id}" data-toggle="modal" data-target="#ModalRegHoras" data-backdrop="static" data-keyboard="false">Registrar Horas</a>
                        </td>
                      </tr>`;
        });
        tbl_docentesHoras.destroy();
        $("#TablaDocenteHoras tbody").html(template);

        tbl_docentesHoras = $("#TablaDocenteHoras").DataTable({
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

  let docenteID;
  $(document).on("click", "#RegHoras", function() {
    docenteID = $(this).data("id");
  });

  $("#formRegHoras").submit(function(e) {
    // let form = $("#formRegHoras").serialize();
    let cantHoras = $("#horas").val();
    let fechaHora = $("#fecha").val();
    let observacion = $("#observacion").val();
    let IDdocente = docenteID;
    $.ajax({
      url: "procesos/reg_horas.php",
      type: "POST",
      data: { cantHoras, fechaHora, IDdocente, observacion },
      cache: false
    })
      .done(function(response) {
        console.log(response);
        if(response == 'hora_agregada'){
          Notificacion_addHoras(response);
        } else if(response == 'fecha_repetida'){
          Notificacion_addHoras(response);
        }
        
        $('#mensaje5').html(texto);
        $('#formRegHoras').trigger("reset");
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
    e.preventDefault();
  });
  function Notificacion_addHoras(msj) {
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
    if (msj == "hora_agregada") {
      toastr.success(' Hora y fecha registrada.');
    } else if(msj == "fecha_repetida") {
      toastr.error('Ya se registro la hora con la fecha.');
    }
  }
 //cambiar contraseña
   $("#formCambPass").on("submit", function(e){
     let pass_nuevo = $("#passnuevo").val();
     $.ajax({
      url: "procesos/cambiar_password.php",
      type: "POST",
      data: { pass_nuevo },
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
        } else if(response == 'exito'){
          msj = `<div class='alert alert-success no-border mb-2' role='alert'>
                  <strong>Su contraseña ha sido cambiada.</strong>
                </div>`;
        }
        $('#mensaje4').html(msj);
        $('#formCambPass').trigger("reset");
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
     e.preventDefault();
    });

    //resetear los div#mensaje
    $(document).on("click", "#CerrarSecciones", function() { //quitar el msj de error
      $('#mensaje2').html('');
    });
    $(document).on("click", "#CerrarRegDocente", function() { //quitar el msj de error
      $('#mensaje3').html('');
    });
    $(document).on("click", "#CerrarCambiar", function() { //quitar el msj de error
      $('#mensaje4').html('');
    });
    $(document).on("click", "#RegistraHoras", function() { //quitar el msj de error
      $('#mensaje5').html('');
    });
});