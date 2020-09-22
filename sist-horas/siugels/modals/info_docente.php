        <!-- Modal-->
        <div class="modal fade text-xs-left" id="ModalDocenteInfo" tabindex="-1" role="dialog"
            aria-labelledby="myModalLabel17" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel17">Datos del Docentes</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form" id="FormUpdateInfoDoc">
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">Nombres</label>
                                            <input type="text" id="nDocente" class="letras form-control"
                                                placeholder="" name="nDocente">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">Apellido Paterno</label>
                                            <input type="text" id="apaterno" class="letras form-control"
                                                placeholder="" name="apaterno">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">Apellido Materno</label>
                                            <input type="text" id="amaterno" class="letras form-control"
                                                placeholder="" name="amaterno">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">D.N.I</label>
                                            <input type="text" id="d_dni" maxlength="8" class="form-control" placeholder=""
                                                name="dni">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">Jornada Laboral</label>
                                            <input type="text" id="d_jornada_laboral" class="form-control"
                                                placeholder="" name="d_jornada_laboral" min="1" pattern="^[0-9]+">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">Horas Programadas</label>
                                            <input type="text" id="d_hrs_programadas" class="form-control"
                                                placeholder="" name="d_hrs_programadas" min="1" pattern="^[0-9]+">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput5">Grado</label>
                                            <input type="text" id="grado_n" class="form-control" placeholder=""
                                                name="grado_n" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput5">Sección</label>
                                            <input type="text" id="seccion_n" class="form-control" placeholder=""
                                                name="seccion_n" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <!-- <input type="submit" class="btn btn-info" value="Actualizar"> -->
                        <button type="submit" class="btn btn-info">Actualizar</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal">Salir</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Sizes end -->