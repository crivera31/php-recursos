<?php
    session_start();
	if (!empty($_SESSION['active'])) {
        header('location: siugels/');
	} else {
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Acceder | SIUGELS</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="recurso_login/images/icons/inicio.ico" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="recurso_login/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="recurso_login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="recurso_login/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="recurso_login/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="recurso_login/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="recurso_login/css/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="recurso_login/css/util.css">
  <link rel="stylesheet" type="text/css" href="recurso_login/css/main.css">
  <link rel="stylesheet" type="text/css" href="recurso_login/css/estilo.css">
  <!--===============================================================================================-->
  <style>
  #mostrarmodal .modal-dialog {
    -webkit-transform: translate(0,-50%);
    -o-transform: translate(0,-50%);
    transform: translate(0,-50%);
    top: 30%;
    margin: 0 auto;
  }
  .texto{
    text-align: justify;
  }
  </style>
</head>

<body>

  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="recurso_login/images/logo-ugel.png" alt="PNG">
        </div>
        <form class="login100-form validate-form" id="formLogin">
          <span class="login100-form-title">
            Inicio de Sesión
          </span>

          <div class="wrap-input100 validate-input" data-validate="Ingrese su usuario">
            <input class="input100" type="text" name="username" id="user" placeholder="Usuario">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Ingrese su contraseña">
            <input class="input100" type="password" name="password" id="pass" placeholder="Password">
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
              Acceder
            </button>
          </div>

          <div class="text-center p-t-12">
            <!-- <span class="txt1">
            </span> -->
            <a class="txt2" href="javascript:void(0)" data-toggle="modal" data-target="#ModalResetPass" data-backdrop="static" data-keyboard="false">
            ¿Olvidaste tu contraseña?
            </a>
          </div>

          <div class="text-center p-t-136">
            <!-- <a class="txt2" href="#">
							Create your Account
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a> -->
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- The Modal -->
<div class="modal fade" id="mostrarmodal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
        </div>
        <!-- Modal body -->
        <div class="modal-body">
        <p id="texto">SIUGELS, es un sistema de información de la Unidad de Gestión Educativa Local Santa.</p>
        <p id="texto">Implementando con su módulo de Horas Efectivas AGP (Área de Gestión Pedagógica) para los niveles: INICIAL, PRIMARIA y SECUNDARIA.</p>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <!--===============================================================================================-->
  <script src="recurso_login/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!-- Bootstrap Notify -->
  <script src="recurso_login/js/bootstrap-notify.min.js"></script>
  <!--===============================================================================================-->
  <script src="recurso_login/vendor/bootstrap/js/popper.js"></script>
  <script src="recurso_login/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="recurso_login/vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="recurso_login/vendor/tilt/tilt.jquery.min.js"></script>
  <script>
  $('.js-tilt').tilt({
    scale: 1.1
  })
  $(document).ready(function()
   {
      setTimeout(function(){
        $("#mostrarmodal").modal("show").fadeIn();
      }, 1000);
   });
  </script>
  <!--===============================================================================================-->
  <!-- <script src="recurso_login/js/main.js"></script> -->
  <script src="recurso_login/js/toastr.min.js"></script>
  <script src="recurso_login/js/funciones.js"></script>
  <?php include_once 'modals/reset_password.php'; ?>
</body>

</html>