<?php
 session_start();
	if (empty($_SESSION['active'])) {
		header('location: ../index.php');
  } 
//  print_r ($_SESSION);
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
                <h4 class="card-title">Lista de Docentes</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              </div>
              <div class="card-body collapse in">
                <div class="card-block card-dashboard">
                  <!-- <p><span class="text-bold-600">Example 1:</span> Table with outer spacing</p> -->
                  <div class="float-md-right" style="margin-bottom: -14px;">
                    <div class="d-flex justify-content-between align-items mb-3">
                      <a href="#" class="btn btn-info" data-toggle="modal" data-target="#ModalRegDocente" data-backdrop="static" data-keyboard="false"><i class="icon-plus-round"></i> Registrar</a>
                    </div>
                  </div>
                  <div class="table-responsive"> <!-- table-responsive-->
                    <table id="TablaDocente" class="display table table-striped table-hover" cellspacing="0" width="100%">
                      <thead>
                        <tr id="cabecera">
                          <th style="width:16px;">#</th>
                          <th style="width:140px;">Nombres</th>
                          <th style="width:140px;">Apellido Paterno</th>
                          <th style="width:140px;">Apellido Materno</th>
                          <th style="width:100px;">DNI</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="tbl_docente"> 
                      
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
  <!-- edit institucion Modal HTML -->
  <?php include_once('modals/reg-docente.php');?>
  <?php include_once('modals/info_docente.php');?>
  <?php include 'includes/script-body.php'; ?>
</body>

</html>