$(function() {
  carga_productos();
  var tbl_productos = $("#tbl_producto").DataTable({
    pageLength: 5,
    lengthMenu: [[3, 5, 10, -1], [3, 5, 10, "All"]],
    order: [[4, "asc"]],
    responsive: true,
    pagingType: "full_numbers",
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

  function carga_productos() {
    $.ajax({
      url: "procesos/listar-productos.php",
      type: "GET",
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        // var cont = 0;
        let top = "";
        let estado ="";
        let template = "";
        data.forEach(data => {
          if (data.estado == 1) {
            estado = `<td style="vertical-align:middle;"><span class="custom-badge status-green">Activo</span></td>`;
          } else {
            estado = `<td style="vertical-align:middle;"><span class="custom-badge status-red">Inactivo</span></td>`;
          }
          if (data.top == 1) {
            top = `<td style="vertical-align:middle;"><span class="custom-badge status-grey">Si</span></td>`;
          } else {
            top = `<td style="vertical-align:middle;"><span class="custom-badge status-red">No</span></td>`;
          }
          template += `<tr class="text-center">
              <td style="vertical-align:middle;">
                  <img src="../images/productos/${data.foto}" alt="" class="img-fluid img-thumbnail" width="60">
              </td>
              <td style="vertical-align:middle;">${data.codigo}</td>
              <td style="vertical-align:middle;">S/.${data.precio_venta}</td>`+
              estado +
              top +
              `<td style="vertical-align:middle;">${data.fecha}</td>
              <td style="vertical-align:middle;">
                  <div class="dropdown dropdown-action">
                      <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                      <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(147px, 27px, 0px);">
                          <a class="dropdown-item" href="editar_producto.php?id=${data.codigo}"><i class="fa fa-pencil m-r-5"></i> Editar</a>
                          <a class="dropdown-item" id="cambiar_categoria" data-codigo="${data.codigo}" href="javascript:void(0);" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-trash-o m-r-5"></i> Cambiar categoria</a>
                      </div>
                  </div>
              </td>
          </tr>`;
        });
        tbl_productos.destroy();
        $("#tbl_producto tbody").html(template);
        tbl_productos = $("#tbl_producto").DataTable({
          pageLength: 5,
          lengthMenu: [[3, 5, 10, -1], [3, 5, 10, "All"]],
          order: [[4, "desc"]],
          responsive: true,
          pagingType: "full_numbers",
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

  carga_categoria();
  var tbl_categoriaP = $("#tbl_categoria").DataTable({
    pageLength: 3,
    lengthMenu: [[3, 5, 10, -1], [3, 5, 10, "All"]],
    order: [[0, "asc"]],
    responsive: true,
    pagingType: "full_numbers",
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
  function carga_categoria() {
    $.ajax({
      url: "procesos/listar-categorias.php",
      type: "GET",
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        var cont = 0;
        let estado ="";
        let template = "";
        data.forEach(data => {
          cont++;
          if (data.estado == 1) {
            estado = `<td style="vertical-align:middle;"><span class="custom-badge status-green">Activo</span></td>`;
          } else {
            estado = `<td style="vertical-align:middle;"><span class="custom-badge status-red">Inactivo</span></td>`;
          }
          template += `<tr class="text-center" taskId="${data.id}">
              <td style="vertical-align:middle;">${cont}</td>
              <td style="vertical-align:middle;"><a href="javascript:void(0)" class="task-item">${data.nombre}</a></td>`
              + estado +
              `<td style="vertical-align:middle;">${data.fecha}</td>
                <td style="vertical-align:middle;">
                <div class="dropdown dropdown-action">
                      <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                      <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(147px, 27px, 0px);">
                          <a class="dropdown-item" id="cambiar_estado" data-backdrop="static" data-keyboard="false" href="#" data-id="${data.id}" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-pencil m-r-5"></i> Estado</a>
                      </div>
                  </div>
                </td>
          </tr>`;
        });
        tbl_categoriaP.destroy();
        $("#tbl_categoria tbody").html(template);
        tbl_categoriaP = $("#tbl_categoria").DataTable({
          pageLength: 3,
          lengthMenu: [[3, 5, 10, -1], [3, 5, 10, "All"]],
          order: [[0, "asc"]],
          responsive: true,
          pagingType: "full_numbers",
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
  let edit = false;
  $('#taskForm').submit(function(e) {
    const postData = {
      nombre: $('#nom_cate').val(),
      id: $('#taskId').val()
    };
    let url = edit === false ? 'procesos/tag-add.php' : 'procesos/tag-edit.php';
    $.post(url, postData, function(response) {
        if (response == "success") {
          Notificacion("success_familia");
          carga_categoria();
          $('#taskForm').trigger('reset');
        } else if (response == "success-edit") {
          Notificacion("success_edit");
          carga_categoria();
          $('#taskForm').trigger('reset');
        }
    });
    e.preventDefault();
  });
  function Notificacion(msj) {
    let notify;
    if (msj == "success_familia") {
      notify = "Familia agregada.";
    } else if(msj == "success_edit"){
      notify = "Familia editada.";
    } else if(msj == "success_categoria"){
      notify = "Categoría agregada.";
    } else if(msj == "success_seccion"){
      notify = "Sección agregada.";
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
    toastr.success(notify);
  }
  $(document).on("click", ".task-item", function() {
    let element = $(this)[0].parentElement.parentElement;
    let id = $(element).attr("taskId");
    $.post("procesos/tag-single.php", { id }, function(response) {
      const data = JSON.parse(response);
      $("#taskId").val(data.id);
      $("#nom_cate").val(data.nombre);
      edit = true;
    });
  });
/*add listado categori */
carga_select_familia();
  function carga_select_familia() {
    $.ajax({
      url: "procesos/listar-categorias.php",
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
        $("#carga_familia").append(template); /**carga en agregar_niveles */
        $("#carga_familia1").append(template);/**carga en agregar_niveles */
        $("#carga_familia2").append(template);
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }
  $('#taskForm1').submit(function(e) {
      const postData = {
        // name: $('select[name="carga_familia"] option:selected').text(),
        name: $('#carga_familia option:selected').html(),
        nombre: $('#nom_cate1').val(),
        id: $('#carga_familia').val()
      };
      let url = 'procesos/add-categoria.php';
      $.post(url, postData, function(response) {
          if (response == "success-categoria") {
            Notificacion("success_categoria");
            $('#taskForm1').trigger('reset');
          }
      });
    e.preventDefault();
  });
  let dato;
  $("#carga_familia1").on("change", function() {
    dato = $(this).val();
    $("#carga_categoria1").empty().append('<option disabled selected>Seleccione</option>');;
    carga_select_categoria(dato);
  });
  $("#carga_categoria1").on("change", function () {
    id_categoria = $(this).val();
    $("#carga_seccion1").empty().append('<option disabled selected>Seleccione</option>');;
    carga_select_seccion(id_categoria);
});
  function carga_select_categoria(dato) {

    $.ajax({
      url: "procesos/list-categoria.php",
      type: "POST",
      data: { dato },
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        let template;

        data.forEach(data => {
          template += `<option value="${data.id}"> 
                          ${data.nombre} 
                    </option>`;
        });
        $("#carga_categoria1").append(template);
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }
  function carga_select_seccion(dato) {

    $.ajax({
      url: "procesos/list-categoria.php",
      type: "POST",
      data: { dato },
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        let template;
        let cadena;
        data.forEach(data => {
          template += `<option value="${data.id}"> 
                          ${data.nombre} 
                    </option>`;
        });
        cadena = template + '<option value="0">Ninguno</option>';
        $("#carga_seccion1").append(cadena);
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
  }

  $('#taskForm2').submit(function(e) {
    const postData = {
      name: $('#carga_categoria1 option:selected').html(),
      seccion: $('#nom_seccion2').val(),
      id: $('#carga_categoria1').val()
    };
    let url = 'procesos/add-seccion.php';
    $.post(url, postData, function(response) {
      if (response == "success-seccion") {
        Notificacion("success_seccion");
        $('#taskForm2').trigger('reset');
      }
    });
  e.preventDefault();
});

let codigo;
$(document).on("click", "#cambiar_categoria", function() {/**modal cambia categorias */
  codigo = $(this).attr("data-codigo");
  $('#data_codigo').html(codigo)
});

$("#form_cambiarCat").submit(function (e) {
  let seccion_aux;
  var code = codigo;
  let categoria = $('#carga_categoria1').val();
  let seccion = $('#carga_seccion1').val();

  if (seccion == null) {
    seccion_aux = 0;
  } else {
    seccion_aux = seccion;
  }
  
  $.ajax({
    url: "procesos/update_categoria.php",
    type: "POST",
    data: { code,categoria,seccion_aux },
    cache: false
  })
    .done(function(response) {
      if (response == 'success') {
        alert('Se cambio la categoría.');
      }
    })
    .fail(function(XMLHttpRequest, textStatus, errorThrown) {
      console.log("Status: " + textStatus + " Error: " + errorThrown);
    });
  e.preventDefault();
});

let id;
$(document).on("click", "#cambiar_estado", function() {
  id = $(this).attr("data-id");
});

$(document).on('click', '#btn_1', function(){ 
  $.ajax({
    url: "procesos/cambiar_estado1.php",
    type: "POST",
    data: { id },
    cache: false
  })
    .done(function(response) {
      console.log(response)
      if (response == 'success') {
        carga_categoria();
        alert('Habilitado');
      }
    })
    .fail(function(XMLHttpRequest, textStatus, errorThrown) {
      console.log("Status: " + textStatus + " Error: " + errorThrown);
    });
  e.preventDefault();
});

$(document).on('click', '#btn_2', function(){ 
  $.ajax({
    url: "procesos/cambiar_estado2.php",
    type: "POST",
    data: { id },
    cache: false
  })
    .done(function(response) {
      console.log(response)
      if (response == 'success') {
        carga_categoria();
        alert('Deshabilitado');
      }
    })
    .fail(function(XMLHttpRequest, textStatus, errorThrown) {
      console.log("Status: " + textStatus + " Error: " + errorThrown);
    });
  e.preventDefault();
});

});
