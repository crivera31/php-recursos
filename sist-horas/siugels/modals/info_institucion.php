        <!-- Modal-->
        <div class="modal fade text-xs-left" id="ModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel17" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel17">Datos de la Institución</h4>
              </div>
              <div class="modal-body">
                <form class="form" id="FormUpdateInst">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput1">Nombre</label>
                          <input type="text" id="nom_inst" class="form-control" placeholder="" name="nom_inst">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput2">Dirección</label>
                          <input type="text" id="direccion_inst" class="form-control" placeholder="" name="direccion_inst">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput1">Referencia</label>
                          <input type="text" id="referencia_inst" class="form-control" placeholder="" name="referencia_inst">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput2">Niveles</label>
                          <input type="text" id="niveles_inst" class="form-control" placeholder="" name="niveles_inst" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-9">
                        <div class="form-group">
                          <label for="projectinput1">Ubicación</label>
                          <input type="text" id="ubicacion_inst" class="form-control" placeholder="" name="ubicacion_inst" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput2">Teléfono</label>
                          <input type="text" id="telf_inst" maxlength="9" class="form-control" placeholder="" name="telf_inst">
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-info">Guardar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Modal Sizes end -->