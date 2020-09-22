  <!-- The Modal crud -->
  <div class="modal" id="myModalEventos">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="tituloEvento"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form>
            <div class="row">
              <div class="col-md-8">
                <div class="form-group">
                  <label for="">Título</label>
                  <input type="text" class="form-control" id="txtTitulo" name="txtTitulo" placeholder="">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="">Hora del evento</label>
                  <div class="input-group clockpicker" data-align="bottom" data-autoclose="true">
                    <input type="text" class="form-control" id="txtHora" name="txtHora" placeholder="">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="">Descripción</label>
                  <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="3"></textarea>
                </div>
              </div>
              <input type="hidden" name="txtID" id="txtID">
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Fecha Inicio</label>
                  <input class="form-control" id="txtFechaI" name="txtFechaI" data-toggle="datepicker">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="">Fecha Final</label>
                  <input class="form-control" id="txtFechaF" name="txtFechaF" data-toggle="datepicker">
                </div>
              </div>
            </div>
            <div class="row">
              <!-- <input type="hidden" class="form-control" id="txtFecha" name="txtFecha" aria-describedby="emailHelp" placeholder=""> -->
              <div class="col col-lg-2">
                <div class="form-group">
                  <label for="">Color</label>
                  <input type="color" style="height: 25px; width: 50px;" value="#ff0000" id="txtColor" name="txtColor" placeholder="">
                </div>
              </div>
            </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" id="btnAgregar" class="btn btn-success" data-dismiss="modal">Agregar</button>
          <button type="button" id="btnEditar" class="btn btn-success" data-dismiss="modal">Modificar</button>
          <button type="button" id="btnEliminar" class="btn btn-danger" data-dismiss="modal">Borrar</button>
          <button type="button" class="btn btn-dafault" data-dismiss="modal">Cancelar</button>
        </div>
        </form>
      </div>
    </div>
  </div>