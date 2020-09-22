<?php
session_start();
if (empty($_SESSION['active'])) {
  header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'includes/head.php'; ?>
</head>

<body>
  <div id="wrapper">
    <?php include_once 'includes/nav.php'; ?>
    <div id="page-wrapper" class="gray-bg">
      <div class="row border-bottom">
        <?php include_once 'includes/menu.php'; ?>
      </div>
      <div class="wrapper wrapper-content">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox">
              <div class="ibox-title">
                <h5>Añadir fecha de prácticas</h5>
              </div>
              <div class="ibox-content">
                <form id="formInicioPract">
                <div class="row">
                  <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                      <label for="projectinput1">Nombres</label>
                      <select id="name" class="form-control" required>
                        <option value="" selected disabled></option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                      <label for="projectinput2">Apellido Paterno</label>
                      <input type="text" id="paterno_ape" name="paterno_ape" class="letras form-control" disabled>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                      <label for="projectinput2">Apellido Materno</label>
                      <input type="text" id="materno_ape" name="materno_ape" class="letras form-control" disabled>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-md-3">
                    <div class="form-group" id="data_2">
                      <label class="font-normal">Fecha inicio</label>
                      <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text"
                          class="form-control" id="inicio" name="inicio" required>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-3">
                    <div class="form-group" id="data_2">
                      <label class="font-normal">Fecha final</label>
                      <div class="input-group date">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text"
                          class="form-control" id="final" name="final" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="Guardar">
                    </div>
                  </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox ">
              <div class="ibox-title">
                <h5>Listado de Practicantes</h5>
              </div>
              <div class="ibox-content">
                <div class="table-responsive">
                  <table id="tbl_iniciar" class="table table-striped table-bordered table-hover dataTables-example">
                    <thead>
                      <tr id="cabecera">
                        <th style="width: 60px;">#</th>
                        <th style="width: 160px;">Nombres</th>
                        <th style="width: 160px;">Apellido Paterno</th>
                        <th style="width: 160px;">Apellido Materno</th>
                        <th style="width: 80px;">F. inicio</th>
                        <th style="width: 80px;">F. final</th>
                        <th style="width: 80px;">Estado</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>asas</th>
                        <th>asas</th>
                        <th>asas</th>
                        <th>asas</th>
                        <th>asas</th>
                        <th>asas</th>
                        <th>asas</th>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer">
        <div>
          <strong>Copyright</strong> Example Company &copy; 2019
        </div>
      </div>
    </div>
    <div id="right-sidebar">

    </div>
  </div>
  <?php include_once 'includes/script.php'; ?>
</body>

</html>