<!-- The Modal -->
<div class="modal fade" id="ModalResetPass">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">Recuperar Contraseña</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div id="msj_reset"></div>
        <form class="form" id="formResetPassword">
          <div class="form-body">
          <div class="form-group">
              <div class="col-md-9">
                <label for="eventRegInput1">Ingrese su usuario</label>
                <input type="text" id="mi_user" class="form-control" name="mi_user" required>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-9">
                <label for="eventRegInput1">Nueva contraseña</label>
                <input type="password" id="nueva_pass" class="form-control" name="nueva_pass" required>
              </div>
            </div>

            <div class="form-group">
              <div class="col-md-9">
                <label for="eventRegInput2">Confirmar contraseña</label>
                <input type="password" class="letras form-control" name="confirma_pass" id="confirma_pass" required>
              </div>
            </div>
          </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" class="btn btn-info" value="Actualizar">
        <button type="button" id="CerrarReset" class="btn btn-light" data-dismiss="modal">Salir</button>
      </div>
      </form>
    </div>
  </div>
</div>