$(function () {
    var tbl_empresa = $("#tbl_empresa").DataTable({
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
    var tbl_persona = $("#tbl_persona").DataTable({
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
    lista_empresas();
    function lista_empresas() {
        $.ajax({
          url: "procesos/listar_empresas.php",
          type: "GET",
          cache: false
        })
          .done(function(response) {
            let data = JSON.parse(response);
            var cont = 0;
            let template = "";
            data.forEach(data => {
                cont++;
              template += `<tr class="text-center">
                  <td style="">${cont}</td>
                  <td style="">${data.nombre_titular}</td>
                  <td style="">${data.apellido_titular}</td>
                  <td style="">${data.razon_social}</td>
                  <td style="">
                    <span class="nobr"> <a href="info_empresa.php?id=${data.id}">Ver más</a></span>
                  </td>
              </tr>`;
            });
            tbl_empresa.destroy();
            $("#tbl_empresa tbody").html(template);
            tbl_pedido = $("#tbl_empresa").DataTable({
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
    
    lista_personas();
    function lista_personas() {
        $.ajax({
          url: "procesos/listar_personas.php",
          type: "GET",
          cache: false
        })
          .done(function(response) {
            let data = JSON.parse(response);
            var cont = 0;
            let template = "";
            data.forEach(data => {
                cont++;
              template += `<tr class="text-center">
                  <td style="">${cont}</td>
                  <td style="">${data.nombres}</td>
                  <td style="">${data.apellido_p} ${data.apellido_m}</td>
                  <td style="">${data.dni}</td>
                  <td style="">
                    <span class="nobr"> <a href="info_persona.php?id=${data.id}">Ver más</a></span>
                  </td>
              </tr>`;
            });
            tbl_persona.destroy();
            $("#tbl_persona tbody").html(template);
            tbl_pedido = $("#tbl_persona").DataTable({
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

});
