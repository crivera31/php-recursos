<div class="modal" id="ModalRegPract">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Registrar practicante</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <div class="col">
          <form id="formRegPracticante" action="#" class="wizard-big">
            <h1>Datos Personales</h1>
            <fieldset>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="projectinput1">Nombres</label>
                    <input type="text" id="nombres" class="letras form-control" placeholder="Nombres" name="nombres"
                      required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="projectinput2">Apellido Paterno</label>
                    <input type="text" id="ap_paterno" class="letras form-control" placeholder="Apellido Paterno"
                      name="ap_paterno" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="projectinput1">Apellido Materno</label>
                    <input type="text" id="ap_materno" class="letras form-control" placeholder="Apellido Materno"
                      name="ap_materno" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="projectinput1">DNI</label>
                    <input type="text" id="dni" class="numeros form-control" placeholder="" name="dni" pattern="^[0-9]+"
                      maxlength="8" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="projectinput1">Teléfono</label>
                    <input type="text" id="telefono" class="numeros form-control" placeholder="" name="telefono"
                      pattern="^[0-9]+" maxlength="9" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="projectinput1">Correo <b>*opcional</b></label>
                    <input type="email" id="correo" class="form-control" placeholder="" name="correo">
                  </div>
                </div>
              </div>

            </fieldset>
            <h1>Ubicación</h1>
            <fieldset>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="projectinput1">Departamento</label>
                    <input type="text" id="departamento" class="letras form-control" placeholder="" name="departamento"
                      required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="projectinput2">Provincia</label>
                    <input type="text" id="provincia" class="letras form-control" placeholder="" name="provincia"
                      required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="projectinput1">Distrito</label>
                    <input type="text" id="distrito" class="letras form-control" placeholder="" name="distrito"
                      required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="projectinput2">Dirección</label>
                    <input type="text" id="direccion" class="form-control" placeholder="Av. Example Mz-E"
                      name="direccion" required>
                  </div>
                </div>
              </div>
            </fieldset>
            <h1>Institución</h1>
            <fieldset>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="projectinput2">Institución</label>
                    <input type="text" id="" class="form-control" placeholder=""
                      name="" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="projectinput2">Carrera</label>
                    <input type="text" id="" class="form-control" placeholder=""
                      name="" required>
                  </div>
                </div>
              </div>
            </fieldset>
            <h1>Otros</h1>
            <fieldset>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Fundamento del Pedido</label>
                    <textarea class="form-control rounded-0" id="pedido" name="pedido" rows="3" required></textarea>
                  </div>
                </div>
                <div class="col">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Documentos que se adjuntan</label>
                    <textarea class="form-control rounded-0" id="documento" name="documento" rows="3"
                      required></textarea>
                  </div>
                </div>
              </div>
              <div id="row">
                <div class="col-md-4">
                  <div class="form-group" id="data_2">
                    <label class="font-normal">Fecha de registro</label>
                    <div class="input-group date">
                      <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="fecha"
                        name="fecha" class="form-control">
                    </div>
                  </div>

                </div>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" id="Cerrar" class="btn btn-white" data-dismiss="modal">Salir</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>

  </div>
</div>
</div>