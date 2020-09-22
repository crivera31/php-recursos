$(function() {

  $("#calendar").fullCalendar({
    defaultView: 'month',
    dayNamesShort: ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
    weekNumbers: true,
    header: {
    // left: "today,prev,next",
    // center: "title",
    // right: "month,basicWeek,basicDay,agendaWeek,agendaDay"

    left: "prev,next today",
    center: "title",
    right: "month,agendaWeek,agendaDay" 
    },
    selectable: true,
    // select: function(startDate, endDate) {
    //   alert('selected ' + startDate.format() + ' to ' + endDate.format());
    // },
    selectHelper:true,
    eventLimit: true,
    views: {
      month: {
        eventLimit: 3
      }
    },
    // eventRender: function(eventObj, $el) {
    //   $el.popover({
    //     title: eventObj.title,
    //     content: eventObj.descripcion,
    //     trigger: "hover",
    //     html:true,
    //     placement: "top",
    //     container: "body"
    //   });
    // },
    dayClick: function(date, jsEvent, view) {
      console.log('registro');
      $("#btnAgregar").prop("disabled", false);
      $("#btnEditar").prop("disabled", true);
      $("#btnEliminar").prop("disabled", true);

      limpiarForm();
      //$("#txtFecha").val(date.format()); //muestra la fecha en input hidden txtFecha modal
      $("#myModalEventos").modal();
    },

    events: "proceso/eventos.php",
    // timeFormat: "h(:mm)a",

    eventClick: function(calEvent, jsEvent, view) {
      console.log('Ver');
      $("#btnAgregar").prop("disabled", true);
      $("#btnEditar").prop("disabled", false);
      $("#btnEliminar").prop("disabled", false);
      /*h2 */
      $("#tituloEvento").html(calEvent.title + "hola");
      /*mostrar dato del calendar */
      $("#txtID").val(calEvent.id);
      $("#txtTitulo").val(calEvent.title);
      $("#txtDescripcion").val(calEvent.descripcion);
      $("#txtColor").val(calEvent.color);

      $("#txtHora").val(calEvent.hora);

      var FechaI = calEvent.start._i.split(" ");
      var FechaF = calEvent.end._i.split(" ");

      $("#txtFechaI").val(FechaI[0].split("-").reverse().join("-"));
      $("#txtFechaF").val(FechaF[0].split("-").reverse().join("-"));

      // console.log(FechaI[0].split("-").reverse().join("-") + ' ' + FechaF[0]);
      $("#myModalEventos").modal();

    }, 
    
    editable: true,
    
    eventDrop: function(calEvent) {
      // console.log('arrastrar');
      $("#txtID").val(calEvent.id);
      $("#txtTitulo").val(calEvent.title);
      $("#txtDescripcion").val(calEvent.descripcion);
      $("#txtColor").val(calEvent.color);
      $("#txtHora").val(calEvent.hora);

      var Fecha1 = calEvent.start.format().split("T");
      var Fecha2 = calEvent.end.format().split("T");
      // console.log(FechaI[0] + ' ' + FechaF[0]);
      $("#txtFechaI").val(Fecha1[0]);
      $("#txtFechaF").val(Fecha2[0]);
      RecolectarDATA();
      enviarDATA("modificar", NuevoEvento, true);
    } 
  
  });
    
  $('.clockpicker').clockpicker(
    {
      // autoclose: true,
      twelvehour: true
    }
  );
  $('[data-toggle="datepicker"]').datepicker({
    autoHide: true,//para q se oculte auto
    months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthsShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
    days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    daysShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
    daysMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
    zIndex: 2048,
    format: 'dd-mm-yyyy'
  });
  /*agregar*/
  let NuevoEvento;
  $('#btnAgregar').click(function(){
    console.log($('#txtFechaI').val())
    RecolectarDATA();
    enviarDATA('agregar', NuevoEvento);
  });
  /*elminar */
  $('#btnEliminar').click(function(){
    RecolectarDATA();
    enviarDATA('eliminar', NuevoEvento);
  });
  /*editar */
  $('#btnEditar').click(function(){
    RecolectarDATA();
    enviarDATA('modificar', NuevoEvento);
  });
  
  // $(document).on('click','#boton',function(){
  //   $.post('hola.php', function(response) {
  //     console.log(response);
  //     alert(response);
  //   })
  // });
  
  function RecolectarDATA(){
    NuevoEvento = {
      id: $('#txtID').val(),
      title: $('#txtTitulo').val(),
      descripcion: $('#txtDescripcion').val(),
      color: $('#txtColor').val(),
      textColor: "#FFFFFF",
      hora: $('#txtHora').val(),
      start: $('#txtFechaI').val(),
      end: $('#txtFechaF').val()
    };
  }
  function enviarDATA(accion, objEvento, modal){
    $.ajax({
      type: 'POST',
      url: 'proceso/eventos.php?accion='+accion,
      data: objEvento,
      success:function(response){
        if(response){
          $("#calendar").fullCalendar('refetchEvents');
          if (!modal) {
            $("#myModalEventos").modal('hide');
          }
        }
      },
      error:function(){
        alert('Error !!!');
      }
    });
  }
  function limpiarForm() {
    $("#tituloEvento").html('Nuevo Evento');
    $("#txtID").val('');
    $("#txtTitulo").val('');
    $("#txtDescripcion").val('');
    $("#txtColor").val('');
    $("#txtHora").val('');
    $("#txtFechaI").val('');
    $("#txtFechaF").val('');
  }

});
