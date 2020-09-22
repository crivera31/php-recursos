$(function () {
  // carga_select_familia();
  // function carga_select_familia() {
  //   $.ajax({
  //     url: "procesos/listar-categorias.php",
  //     type: "GET",
  //     cache: false
  //   })
  //     .done(function(response) {
  //       let data = JSON.parse(response);
  //       let template = "";

  //       data.forEach(data => {
  //         template += `<option value="${data.id}"> 
  //                         ${data.nombre} 
  //                   </option>`;
  //       });
  //       $("#carga_familia").append(template);
  //       $("#carga_familia1").append(template);
  //       $("#reg_familia").append(template);
  //     })
  //     .fail(function(XMLHttpRequest, textStatus, errorThrown) {
  //       console.log("Status: " + textStatus + " Error: " + errorThrown);
  //     });
  // }
  $("#reg_precioC").keyup(function(){
    let dato = $("#reg_precioC").val();
    console.log(dato)
    let calculo1 = (dato * 3.50 * 1.18);

    let c1 = calculo1 * 1.3;
    let c2 = calculo1 * 1.5;

    $("#reg_precioV").val(parseFloat(c1).toFixed(4));
    $("#reg_descuento").val(parseFloat(c2).toFixed(4));
    console.log(calculo1)
  });
  $("#edit_precioC").keyup(function(){
    let dato = $("#edit_precioC").val();
    console.log(dato)
    let calculo2 = (dato * 3.50 * 1.18);
    let c1 = calculo2 * 1.3;
    let c2 = calculo2 * 1.5;
    $("#edit_precioV").val(parseFloat(c1).toFixed(4));

    $("#edit_descuento").val(parseFloat(c2).toFixed(4));
    console.log(calculo2)
  });
  $("#form-addProducto").submit(function (e) {

      let codigo = $('#reg_codigo').val();
      let familia = $('#reg_familia').val();
      let categoria = $('#reg_categoria').val();
      let seccion = $('#reg_seccion').val();
      let precioC = $('#reg_precioC').val();
      let precioV = $('#reg_precioV').val();
      let dscto = $('#reg_descuento').val();
      let estado = $('#reg_estado').val();
      let ficha = $('#reg_ficha').val();
      let descripcion = $('#reg_descripcion').val();
      let top = $('#reg_top').val();
      let nuevo = $('#reg_nuevo').val();

      var files = $('#foto')[0].files[0];
      
      var data = new FormData();
      data.append('file',files);
      data.append('codigo',codigo);
      data.append('id_categoria',categoria);
      data.append('id_seccion',seccion);
      data.append('precio_c',precioC);
      data.append('precio_v',precioV);
      data.append('dscto',dscto);
      data.append('estado',estado);
      data.append('ficha',ficha);
      data.append('descripcion',descripcion);
      data.append('top',top);
      data.append('nuevo',nuevo);
    $.ajax({
      url: "procesos/add-producto.php",
      type: "POST",
      data: data,
      contentType: false,
      cache: false,
      processData: false,
      success: function (response) {
        console.log(response)
        if(response == "success_add_producto"){
          Notificacion("success_add_producto");
        } else if (response == 'error_extension') {
          $('#msj_formato').html('<strong class="text-danger">Solo se permite en formato PNG.</strong>');
          setTimeout(function(){
            $('#msj_formato strong').hide();
           }, 3000);
        }
      }
    });
      e.preventDefault();
  });

  carga_select_familia();
  let id_familia, id_categoria;
  $("#reg_familia").on("change", function () {
      id_familia = $(this).val();
      $("#reg_categoria").empty().append('<option disabled selected>Seleccione</option>');;
      carga_select_categoria(id_familia);
  });
  $("#reg_categoria").on("change", function () {
      id_categoria = $(this).val();
      $("#reg_seccion").empty().append('<option disabled selected>Seleccione</option>');;
      carga_select_seccion(id_categoria);
  });
  function Notificacion(msj) {
    let notify;
    if (msj == "success_update_producto") {
      notify = "Datos actualizados";
    } else if (msj == "success_add_producto") {
      notify = "Producto agregado.";
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
  $("#form-updateProducto").submit(function (e) {
    let id = $('#edit_id').val();
    let codigo = $('#edit_codigo').val();
    let precioC = $('#edit_precioC').val();
    let precioV = $('#edit_precioV').val();
    let dscto = $('#edit_descuento').val();
    let ficha = $('#edit_ficha').val();
    let descripcion = $('#edit_descripcion').val();
    let tags = $('#edit_tags').val();
    let top = $('#notItem1').val();
    let nuevo = $('#notItem2').val();
    let estado = $('#notItem3').val();
    // console.log(dscto);
    
    $.ajax({
      url: "procesos/editar_producto.php",
      type: "POST",
      data: { id,codigo,precioC,precioV,dscto,ficha,descripcion,tags,top,nuevo,estado },
      cache: false
    })
      .done(function(response) {
        console.log(response)
        if (response == "success_update_producto") {
          Notificacion("success_update_producto");
        }
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
    e.preventDefault();
  });

  mostrar_pedidos()
  var tbl_pedido = $("#tbl_pedido").DataTable({
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
  function mostrar_pedidos() {
    $.ajax({
      url: "procesos/listar_pedidos.php",
      type: "GET",
      cache: false
    })
      .done(function(response) {
        let data = JSON.parse(response);
        // var cont = 0;
        let template = "";
        let estado = "";
        data.forEach(data => {
          if(data.estado == 'Pendiente') {
            estado = 'status-red';
          } else if(data.estado == 'Pagado') {
            estado = 'status-green';
          } else {
            estado = 'status-blue';
          }
          template += `<tr class="text-center">
              <td style="">${data.num_pedido}</td>
              <td style="">${data.fecha}</td>
              <td style="">${data.hora}</td>
              <td style="">S/.${data.total}</td>
              <td style=""><span class="custom-badge ${estado}"><em>${data.estado}</em></span></td>
              <td style=""><span class="nobr"> <a href="detalle_pedido.php?id=${data.id}">Detalles</a></span></td>
          </tr>`;
        });
        tbl_pedido.destroy();
        $("#tbl_pedido tbody").html(template);
        tbl_pedido = $("#tbl_pedido").DataTable({
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
      $("#reg_familia").append(template);
    })
    .fail(function(XMLHttpRequest, textStatus, errorThrown) {
      console.log("Status: " + textStatus + " Error: " + errorThrown);
    });
}

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
      $("#reg_categoria").append(template);
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
      $("#reg_seccion").append(cadena);
    })
    .fail(function(XMLHttpRequest, textStatus, errorThrown) {
      console.log("Status: " + textStatus + " Error: " + errorThrown);
    });
}

function ver_img() {
  document.getElementById("foto").onchange = function(e) {
      let reader = new FileReader();
    reader.onload = function(){
      let preview = document.getElementById('load_img'),
              image = document.createElement('img');

      image.src = reader.result;
      preview.innerHTML = '';
      preview.append(image);
    };
    reader.readAsDataURL(e.target.files[0]);
  }
}

function upload_image(){
  var inputFileImage = document.getElementById("foto");
  var file = inputFileImage.files[0].name;
  console.log(file)

  var files = $('#foto')[0].files[0];
  var data = new FormData();
  data.append('file',files);

  $.ajax({
      url: "procesos/update_foto.php",        // Url to which the request is send
      type: "POST",             // Type of request to be send, called as method
      data: data, 			  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
      contentType: false,       // The content type used when sending data to the server.
      cache: false,             // To unable request pages to be cached
      processData: false,        // To send DOMDocument or non processed data file it is set to false
      success: function (response){
        console.log(response)
          if (response == 'error_extension') {
              $('#msj_upload_img').html('<strong class="text-danger"> No se pudo subir la foto.</strong>');
              setTimeout(function(){
                $('#msj_upload_img strong').hide();
               }, 3000);
          } else {
               $("#load_img").html("<img id='foto' class='img-thumbnail inline-block' src='../images/productos/" + file + "' style='max-width: 100%; height: auto;'>");
               $('#msj_upload_img').html('<strong class="text-success">Foto cambiada, actualize la pagina.</strong>');
          }
      }
  });
}