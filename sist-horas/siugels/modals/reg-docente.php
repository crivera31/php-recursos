        <!-- Modal-->
        <div class="modal fade text-xs-left" id="ModalRegDocente" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel17">Registrar Docentes</h4>
                    </div>
                    <div class="modal-body">
                        <div id="mensaje3"></div>
                        <form class="form" id="formDocente">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">Nombres</label>
                                            <input type="text" id="nomDocente" class="letras form-control"
                                                placeholder="Nombres" name="nomDocente" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">Apellido Paterno</label>
                                            <input type="text" id="ap_paterno" class="letras form-control"
                                                placeholder="Apellido Paterno" name="ap_paterno" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">Apellido Materno</label>
                                            <input type="text" id="ap_materno" class="letras form-control"
                                                placeholder="Apellido Materno" name="ap_materno" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">D.N.I</label>
                                            <input type="text" id="dni" class="numeros form-control" placeholder="12345678"
                                                name="dni" pattern="^[0-9]+" maxlength="8" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">Horas Programadas</label>
                                            <input type="text" id="hrs_programadas" class="numeros form-control"
                                                placeholder="" name="hrs_programadas" min="1" pattern="^[0-9]+" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">Jornada Laboral</label>
                                            <input type="text" id="jornada_laboral" class="numeros form-control"
                                                placeholder="" name="jornada_laboral" min="1" pattern="^[0-9]+" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput5">Grado</label>
                                            <select id="n_grado" name="n_grado" class="form-control" required>
                                                <option value="" selected="" disabled="">-- Seleccione --</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput5">Sección</label>
                                            <select id="n_seccion" name="n_seccion" class="form-control">
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-info" value="Agregar">
                        <button type="button" id="CerrarRegDocente" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Sizes end -->