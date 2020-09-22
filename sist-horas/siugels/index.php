<?php
session_start();
if (empty($_SESSION['active'])) {  //si $_SESSION['active'] esta vacio pues no aun no hay sesion
  // echo $_SESSION['active'];
  header('location: ../index.php');
}

require_once '../class/Usuario.php';

$cl_usuario = new Usuario();

$directores = $cl_usuario->Count_directores();
$docentes = $cl_usuario->Count_docentes();
$colegios = $cl_usuario->Count_colegios();

// print_r ($_SESSION);
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
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <title>SIUGELS</title>
  <?php include 'includes/script-head.php'; ?>
</head>

<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
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
        <?php
        if ($_SESSION['rolID'] != 2) {  ?>
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
              <div class="card-body">
                <div class="card-block">
                  <div class="media">
                    <div class="media-body text-xs-left">
                      <h3 class="deep-orange"><?php echo $directores; ?></h3>
                      <span>Directores</span>
                    </div>
                    <div class="media-right media-middle">
                      <i class="icon-ios-people deep-orange font-large-2 float-xs-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
              <div class="card-body">
                <div class="card-block">
                  <div class="media">
                    <div class="media-body text-xs-left">
                      <h3 class="teal"><?php echo $colegios; ?></h3>
                      <span>Instituciones</span>
                    </div>
                    <div class="media-right media-middle">
                      <i class="icon-office teal font-large-2 float-xs-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card">
              <div class="card-body">
                <div class="card-block">
                  <div class="media">
                    <div class="media-body text-xs-left">
                      <h3 class="cyan"><?php echo $docentes; ?></h3>
                      <span>Docentes</span>
                    </div>
                    <div class="media-right media-middle">
                      <i class="icon-user-tie cyan font-large-2 float-xs-right"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-xs-12">
            <a href="https://mega.nz/fm/S8N0hS4Q" target="_blank" class="btn btn-info"><i class="icon-download22"></i> Descargar los archivos</a>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>
  </div>
  <!-- fin contenido-->
  <!-- footer -->
  <?php //include 'includes/footer.php'; 
  ?>
  <!-- fin footer -->
  <?php include 'includes/script-body.php'; ?>

</body>

</html>