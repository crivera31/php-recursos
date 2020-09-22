$(function () {
  var tbl_menus = $("#tbl_menus").DataTable({
    pageLength: 5,
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
  mostrar_menus();
  function mostrar_menus() {
    $.ajax({
      url: "procesos/listar_menus.php",
      type: "GET",
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        var cont = 1;
        let estado ="";
        let template = "";
        data.forEach(data => {
          if (data.estado == 1) {
            estado = `<td style="vertical-align:middle;"><span class="custom-badge status-green">Activo</span></td>`;
          } else {
            estado = `<td style="vertical-align:middle;"><span class="custom-badge status-red">Inactivo</span></td>`;
          }

          template += `<tr class="text-center" row-id='${data.id}'>
              <td style="">${cont++}</td>
              <td style="">${data.padre}</td>
              <td style="">${data.nombre}</td>
              <td style="">${data.descripcion}</td>`
              + estado +
              `<td style="">
                  <div class="dropdown dropdown-action">
                  <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-h"></i></a>
                  <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(147px, 27px, 0px);">
                      <a class="dropdown-item" id="cambiar_estado" data-backdrop="static" data-keyboard="false" href="#" data-id="${data.id}" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-pencil m-r-5"></i> Estado</a>
                  </div>  
              </div>
              </td>
          </tr>`;
        });
        tbl_menus.destroy();
        $("#tbl_menus tbody").html(template);
        tbl_menus = $("#tbl_menus").DataTable({
          pageLength: 5,
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
          mostrar_menus();
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
          mostrar_menus();
          alert('Deshabilitado');
        }
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
    e.preventDefault();
  });
});