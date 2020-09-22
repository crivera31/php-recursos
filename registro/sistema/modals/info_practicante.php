<div class="modal" id="ModalInfoPract">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Información del Practicante</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="col-lg-12">
          <div class="tabs-container">
            <ul class="nav nav-tabs" role="tablist">
              <li><a class="nav-link active show" data-toggle="tab" href="#tab-1"> Datos Personales</a></li>
              <li><a class="nav-link" data-toggle="tab" href="#tab-2"> Otros</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" id="tab-1" class="tab-pane active show">
                <div class="panel-body">
                  <form class="form" id="formRegPracticante" name="formRegPracticante">
                    <div class="form-body">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="projectinput1">Nombres</label>
                            <input type="text" id="nombres_p" class="letras form-control" name="nombres_p" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="projectinput2">Apellido Paterno</label>
                            <input type="text" id="ap_paterno_p" class="letras form-control" name="ap_paterno_p" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="projectinput1">Apellido Materno</label>
                            <input type="text" id="ap_materno_p" class="letras form-control" name="ap_materno_p" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group">
                            <label for="projectinput2">Dirección</label>
                            <input type="text" id="direccion_p" class="form-control" name="direccion_p" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="projectinput2">DNI</label>
                            <input type="text" id="dni_p" class="numeros form-control" name="dni_p" pattern="^[0-9]+" maxlength="8" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="projectinput2">Correo</label>
                            <input type="email" id="correo_p" class="form-control" name="correo_p" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="projectinput2">Teléfono</label>
                            <input type="text" id="telefono_p" class="numeros form-control" name="telefono_p" pattern="^[0-9]+" maxlength="9" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="projectinput1">Departamento/Provincia/Distrito</label>
                            <input type="text" id="ubicacion_p" class="form-control" name="ubicacion_p" disabled>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
              <div role="tabpanel" id="tab-2" class="tab-pane">
                <div class="panel-body">
                  <div class="form-body">
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Fundamento del Pedido</label>
                          <textarea class="form-control rounded-0" id="pedido_p" name="pedido_p" rows="3"
                            required></textarea>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Documentos que se adjuntan</label>
                          <textarea class="form-control rounded-0" id="documento_p" name="documento_p" rows="3"
                            required></textarea>
                        </div>
                      </div>
                    </div>
                    <div id="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="projectinput1">Fecha de registo</label>
                          <input type="date" id="fecha_p" class="form-control" placeholder="" name="fecha_p" required disabled>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Salir</button>
        <!-- <input type="submit" class="btn btn-primary" value="Save changes"> -->
      </div>
      </form>
    </div>
  </div>
</div>