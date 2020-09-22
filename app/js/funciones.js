var items_helper = {
  calcularImporte: function(id, precio, cantidad){
    $('#txt_total_' + id).html((parseFloat(precio) * parseFloat(cantidad)).toFixed(2));
    this.actualizarCantidad(id, cantidad);/* en la session*/
    this.calcularGranTotal();
  },
  calcularGranTotal: function(){
    var total = 0;
    $('strong[id^="txt_total_"]').each(function(){
      total += parseFloat($(this).html());
    });
    $('#txtTotal').html(total.toFixed(2));
  },
  actualizarCantidad: function(id, cantidad){
    $.post("procesos/actualizar_cantidad.php", { id, cantidad }, function(response) {
      console.log(response)
    });
  }
};
function cargar_departamentos() {
  $.ajax({
    url: "procesos/cargar_departamentos.php",
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
function cargar_provincias(dato) {
  $.ajax({
    url: "procesos/cargar_provincia.php",
    type: "POST",
    data: { dato },
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
function cargar_distritos(dato) {
  $.ajax({
    url: "procesos/cargar_distrito.php",
    type: "POST",
    data: { dato },
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
$(function() {
  cargar_departamentos();
  let depart,provin;
  $("#departamento").on("change", function() {
    depart = $(this).val();
    cargar_provincias(depart);
  });
  
  $("#provincia").on("change", function() {
    provin = $(this).val();
    cargar_distritos(provin);
  });

  $("#departamento").change(function() {
    $("#provincia")
      .empty()
      .attr("disabled", false)
      .html('<option value="" selected disabled>-- Seleccione Provincia --</option>');
  });
  $("#provincia").change(function() {
    $("#distrito")
      .empty()
      .attr("disabled", false)
      .html('<option value="" selected disabled>-- Seleccione Distrito --</option>');
  });
  function ocultar() {
    setTimeout(function() {
      $("#msj_registro").fadeOut(1500);
    },3000);
  }
  $("#form_nuevo").submit(function(e) {
    let form_registra = $("#form_nuevo").serialize();
    $.ajax({
      url: "procesos/reg_cliente.php",
      type: "POST",
      data: form_registra,
      cache: false
    })
      .done(function(response) {
        if (response == "success") {
          // $('#msj_registro').html('<div class="alert alert-success" role="alert"><strong>Se registro correctamente.</strong></div>');
          // ocultar_nuevo();
          Notificacion_registro();
          $("#form_nuevo").trigger("reset");
        } 
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
    e.preventDefault();
  });
  $("#form_empresa").submit(function(e) {
    let form_registra = $("#form_empresa").serialize();
    $.ajax({
      url: "procesos/reg_empresa.php",
      type: "POST",
      data: form_registra,
      cache: false
    })
      .done(function(response) {
        console.log(response);
        if (response == "success") {
          // $('#msj_empresa').html('<div class="alert alert-success" role="alert"><strong>Se registro correctamente.</strong></div>');
          // ocultar_empresa();
          Notificacion_registro();
          $("#form_empresa").trigger("reset");
        } 
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
    e.preventDefault();
  });
  function Notificacion_registro() {
    let notify;
      notify = "Se registro correctamente.";
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
  $("#form_login").submit(function(e) {
    let form_logueo = $("#form_login").serialize();
    $.ajax({
      url: "procesos/logueo.php",
      type: "POST",
      data: form_logueo,
      cache: false
    })
      .done(function(response) {
        console.log(response)
        if (response == "success") {
          location.href = "home";
        } else {
          $('#msj_login').html('<div class="alert alert-danger" role="alert"><strong>Correo o contraseña incorrectos.</strong></div>');
          ocultar_login();
          // $("#form_nuevo").trigger("reset");
        }
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
    e.preventDefault();
  });
  function ocultar_nuevo() {
    setTimeout(function() {
      $("#msj_registro div").fadeOut(1500);
    },3000);
  }
  function ocultar_empresa() {
    setTimeout(function() {
      $("#msj_empresa div").fadeOut(1500);
    },3000);
  }
  function ocultar_login() {
    setTimeout(function() {
      $("#msj_login div").fadeOut(1500);
    },3000);
  }
  /*add cart*/
  $(document).on("click", ".add-cart", function() {
    let id = $('#idP').val();
    let codigo = $('#codigoP').text();
    let foto = $('#fotoP').val();
    let precio = $('#precioP').text();
    let cantidad = $('#qty').val();
    let btnAccion = 'Agregar';
    // console.log(id + " - " + codigo + " - " +foto + " - " + precio + " - " +cantidad);
    $.ajax({
      url: "/procesos/acciones-carrito.php",
      type: "POST",
      data: { id,codigo,foto,precio,cantidad,btnAccion },
      cache: false
    })
    .done(function(response) {
      // console.log(response)
      let data = JSON.parse(response);
      // console.log("Mensaje: " +data.mensaje);
      // console.log("Items: " +data.count_carrito);
      // if (data.mensaje == 'agregado') {
        $('.cart_count').html(data.count_carrito);
      // $('#mensaje_carrito').html('<div class="alert alert-success" role="alert"><b>'+data.mensaje+'</b></div>');
      Notificacion();
    })
    .fail(function(XMLHttpRequest, textStatus, errorThrown) {
      console.log("Status: " + textStatus + " Error: " + errorThrown);
    });
  });
  function Notificacion() {
    let notify;
      notify = "El producto fue agregado al carrito.";
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
  /*delete cart */
  $(document).on("click", ".delete-cart", function() {
    let element = $(this)[0].parentElement.parentElement;
    let idRow = $(element).attr("rowId");
    let btnAccion = "Eliminar";
    $.post("procesos/acciones-carrito.php", { idRow, btnAccion }, function(response) {
      let data = JSON.parse(response);
      let pagina = 'carrito';
      if (data.mensaje == 'borrado') {
        $(element).hide(1000);
      }
      if (data.count_carrito == 0) {
        location.href = pagina;
      }
      $(".cart_count").html(data.count_carrito);

    });
  });
  /**update empresa profile */
  function Notificacion_update_datos_personales() {
    let notify;
      notify = "Datos actualizados.";
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
  $("#form-updateProfileEmpresa").submit(function(e) {
    let form = $("#form-updateProfileEmpresa").serialize();
    $.ajax({
      url: "procesos/update_datos_empresa.php",
      type: "POST",
      data: form,
      cache: false
    })
      .done(function(response) {
        console.log(response)
        if (response == 'success') {
          Notificacion_update_datos_personales();
          $("#up-pass").val('');
        }
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
    e.preventDefault();
  });
  /*update profile */
  $("#form-updateProfile").submit(function(e) {
    let form = $("#form-updateProfile").serialize();
    $.ajax({
      url: "procesos/update_datos.php",
      type: "POST",
      data: form,
      cache: false
    })
      .done(function(response) {
        console.log(response)
        if (response == 'success') {
          Notificacion_update_datos_personales();
          $("#up-pass").val('');
        }
      })
      .fail(function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      });
    e.preventDefault();
  });
  /*procesar pedido persona*/
    $("#procesarPedido").submit(function(e) {
      let form = $("#form-procesarPedido").serialize();
      
      $.ajax({
        url: "procesos/finalizar-compra.php",
        type: "POST",
        data: form,
        cache: false,
        beforeSend: function() {
            $('#content').html('<div class="loading" id="preload"><img id="gif-load" src="images/loading.gif"/><br/>Un momento, por favor.....</div>').show();
        },
        success: function(response) {
          console.log(response)
          // let pagina = 'finalizar_compra?num_pedido=' + response;
          let data = JSON.parse(response);
          console.log(data.codigo);
          console.log(data.count_carrito);
          
          setTimeout(function(){
            $('#content').hide();
            // location.href = pagina;
            $("#num_pedido").html(data.codigo);
            $(".cart_count").html(data.count_carrito);

            $("#myModal").modal("show");
           }, 9000);
        },
        complete:function(data){
          $('#content').fadeIn(600);
         },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
          console.log("Status: " + textStatus + " Error: " + errorThrown);
        }
      });
    e.preventDefault();
  });
  $(".fin_proceso").click(function(){
    location.href = 'mi_cuenta';
  });
  /**procesar pedido empresa */
  $("#procesarPedidoEmpresa").submit(function(e) {
    let form = $("#form-procesarPedidoEmpresa").serialize();
    $.ajax({
      url: "procesos/finalizar-compra-empresa.php",
      type: "POST",
      data: form,
      cache: false,
      beforeSend: function() {
          $('#content').html('<div class="loading" id="preload"><img id="gif-load" src="images/loading.gif"/><br/>Un momento, por favor.....</div>').show();
      },
      success: function(response) {
        console.log(response)
        // let pagina = 'finalizar_compra?num_pedido=' + response;
        let data = JSON.parse(response);
        console.log(data.codigo);
        console.log(data.count_carrito);
        
        setTimeout(function(){
          $('#content').hide();
          // location.href = pagina;
          $("#num_pedido").html(data.codigo);
          $(".cart_count").html(data.count_carrito);

          $("#myModal").modal("show");
         }, 5000);
      },
      complete:function(data){
        $('#content').fadeIn(600);
       },
      error: function(XMLHttpRequest, textStatus, errorThrown) {
        console.log("Status: " + textStatus + " Error: " + errorThrown);
      }
    });
  e.preventDefault();
});
});