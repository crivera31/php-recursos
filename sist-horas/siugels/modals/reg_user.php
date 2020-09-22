        <!-- Modal-->
        <div class="modal fade text-xs-left" id="ModalRegUser" tabindex="-1" role="dialog"
          aria-labelledby="myModalLabel17" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel17">Añadir usuario</h4>
              </div>
              <div class="modal-body">
                <div id="notificacion"></div>
                <form class="form" id="formRegUser">
                    <div id="mensaje4"></div>    
                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput1">Usuario</label>
                          <input type="text" id="user" name="user"class="form-control" placeholder="" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="projectinput1">Contraseña</label>
                          <input type="password" id="clave" name="clave" class="form-control" placeholder="" required>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal-footer">
                <input type="submit" class="btn btn-info" value="Agregar">
                <button type="button" id="CerrarRegUser" class="btn btn-light" data-dismiss="modal">Salir</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Modal Sizes end -->