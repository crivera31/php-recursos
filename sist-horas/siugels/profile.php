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
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" id="basic-layout-card-center"><i class="icon-user"></i> Datos Personales</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              </div>
              <div class="card-body collapse in">
                <div class="card-block">
                  <div id="mensaje">
                  </div>
                  <form class="form" id="formProfile">
                    <div class="form-body">
                      <div class="form-group">
                        <label for="eventRegInput1">Usuario</label>
                        <input type="text" id="usuario" class="form-control" placeholder="" name="usuario" >
                      </div>

                      <div class="form-group">
                        <label for="eventRegInput2">Nombres</label>
                        <input type="text" class="letras form-control" placeholder="Nombres" name="nombres" id="nombres"
                          required>
                      </div>

                      <div class="form-group">
                        <label for="eventRegInput2">Apellido Paterno</label>
                        <input type="text" class="letras form-control" placeholder="Apellido Paterno" name="ape_paterno"
                          id="ape_paterno" required>
                      </div>

                      <div class="form-group">
                        <label for="eventRegInput3">Apellido Materno</label>
                        <input type="text" class="letras form-control" placeholder="Apellido Materno" name="ape_materno"
                          id="ape_materno" required>
                      </div>

                      <div class="form-group">
                        <label for="eventRegInput4">Email</label>
                        <input type="email" class="form-control" placeholder="example@example.com" name="correo"
                          id="correo" required>
                      </div>
                    </div>

                    <div class="form-actions center">
                      <button type="submit" class="btn btn-info">Guardar
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
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