<?php
 session_start();
 if (empty($_SESSION['active'])) {  //si $_SESSION['active'] esta vacio pues no aun no hay sesion
  // echo $_SESSION['active'];
  header('location: ../index.php');
} 
  ?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <title>SIUGELS</title>
  <?php include 'includes/script-head.php'; ?>
</head>

<body data-open="click" data-menu="vertical-menu" data-col="2-columns"
  class="vertical-layout vertical-menu 2-columns  fixed-navbar">
  <!-- navbar-fixed-top-->
  <?php include 'includes/navbar.php'; ?>
  <!-- fin navbar-->

  <!-- main menu-->
  <?php include 'includes/main-menu.php'; ?>
  <!-- / main menu-->

  <div class="app-content content container-fluid">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- stats -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Listado de Instituciones</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              </div>
              <div class="card-body collapse in">
                <div class="card-block card-dashboard">
                  <div class="row">
                    <div class="form-group col-md-4">
                      <button type="button" class="btn btn-info" onclick="location.href='reporte_instituciones.php';"><i class="icon-download22"></i> Descargar</button>
                    </div>
                  </div>
                  <div class="table-responsive">
                    <table id="TablaInstituciones" class="display table table-striped table-hover" cellspacing="0"
                      width="100%">
                      <thead>
                        <tr id="cabecera">
                          <th style="width:40px;">#</th>
                          <th style="width:140px;">Nombre</th>
                          <th style="width:140px;">Dirección</th>
                          <th style="width:140px;">Niveles</th>
                          <!-- <th style="width:80px;"></th> -->
                        </tr>
                      </thead>
                      <tbody id="tbl_instituciones">

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ stats -->
      </div>
    </div>
  </div>
  <!-- fin contenido-->

  <!-- footer -->
  <?php //include 'includes/footer.php'; ?>
  <!-- fin footer -->
  <?php include 'includes/script-body.php'; ?>
</body>

</html>