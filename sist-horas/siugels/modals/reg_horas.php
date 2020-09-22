        <!-- Modal-->
        <div class="modal fade text-xs-left" id="ModalRegHoras" tabindex="-1" role="dialog"
          aria-labelledby="myModalLabel17" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel17">Registro de Horas Efectivas</h4>
              </div>
              <div class="modal-body">
                <div id="mensaje5"></div>
                <form class="form" id="formRegHoras">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput1">Horas</label>
                          <input type="text" id="horas" class="form-control" placeholder="" name="horas"
                             required> <!--pattern="^[0-9]+" -->
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput2">Fecha</label>
                          <input type="date" id="fecha" class="form-control" placeholder="" name="fecha" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-9">
                        <div class="form-group">
                          <label for="projectinput1">Observación</label>
                          <textarea class="form-control rounded-0" id="observacion" name="observacion" rows="6"></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-info" value="Registrar">
                <button type="button" id="RegistraHoras" class="btn btn-light" data-dismiss="modal">Salir</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Modal Sizes end -->