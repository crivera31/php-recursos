        <!-- Modal-->
        <div class="modal fade text-xs-left" id="ModalSeccion" tabindex="-1" role="dialog"
          aria-labelledby="myModalLabel17" aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel17">Grados y Secciones</h4>
              </div>
              <div class="modal-body">
                <div id="mensaje2"></div>
                <form class="form" id="seccion">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="projectinput1">Grado</label>
                        <input type="text" id="nom_grado" name="nom_grado" class="form-control"
                          placeholder="Nombre del grado" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="projectinput2">Sección</label>
                        <input type="text" id="nom_seccion" name="nom_seccion" class="form-control"
                          placeholder="Nombre de la sección" required>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label for="projectinput5">Nivel</label>
                        <select id="mis_niveles" name="interested" class="form-control" required>
                          <option value="" selected="" disabled="">-- Seleccione --</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-actions center">
                    <input type="submit" class="btn btn-info" value="Agregar">
                  </div>
                </form>

                <div class="table-responsive">
                  <table id="TablaNiveles" class="display table table-striped table-hover" cellspacing="0" width="100%">
                    <thead>
                      <tr id="cabecera">
                        <th>Nivel</th>
                        <th style="width: 20px;">Grado</th>
                        <th style="width: 20px;">Sección</th>
                        <!-- <th></th> -->
                      </tr>
                    </thead>
                    <tbody id="tbl_niveles">

                    </tbody>
                  </table>
                </div>

              </div>
              <div class="modal-footer">
                <button type="button" id="CerrarSecciones" class="btn btn-light" data-dismiss="modal">Salir</button>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Sizes end -->