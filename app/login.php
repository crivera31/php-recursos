<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Iniciar Sesión | Segebuco</title>
  <?php include_once 'includes/head.php'; ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156571536-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-156571536-1');
</script>

</head>

<body class="shopping-cart-page">
  <div id="page">
    <!-- Header -->
    <header>
      <?php include_once 'includes/header.php'; ?>
    </header>
    <section class="main-container col1-layout">
      <div class="main container">
        <div class="account-login">
          <div class="page-title">
            <h2>INGRESA A TU CUENTA</h2>
          </div>
          <div class="row">
          <fieldset class="col-md-6 col-md-offset-3">
            <div class="col-2 registered-users">
              <form id="form_login">
                <div class="content">
                  <div id="msj_login" class="row col-md-9">
                  <div class="alert alert-danger" role="alert" style="display: none;"><strong>Correo o contraseña incorrectos.</strong></div>
                  </div>
                  <ul class="form-list">
                    <li>
                      <input type="email" placeholder="Correo Electrónico" title="Correo Electrónico" class="input-text required-entry" id="correo" value="" name="correo" required>
                    </li>
                    <li>
                      <input type="password" placeholder="Contraseña" title="Contraseña" id="password" class="input-text required-entry validate-password" name="password" required>
                    </li>
                  </ul>
                  <br>
                  <div class="buttons-set">
                    <button type="submit" id="send2" name="send" type="submit" class="button login"><span>Ingresar</span></button>
                    <a class="forgot-word" href="javascript:void(0)" data-toggle="modal" data-target="#ModalResetPass" data-backdrop="static" data-keyboard="false">¿Olvidaste tu contraseña?</a>
                  </div>
                </div>
              </form>
            </div>
          </fieldset>
          </div>
        </div>
      </div>
    </section>
    <?php include_once 'includes/footer.php'; ?>
  </div>
  <?php include_once 'includes/menu_mobile.php'; ?>
  <!-- Modal -->
  <div class="modal fade" id="ModalResetPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 450px;">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><b>Reestablecer contraseña</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="msj_reset"></div>
          <form class="form" id="formReset">
            <div class="form-group">
              <label for="inputPassword" class="col-form-label">Correo</label>
              <input type="email" class="form-control" id="re_correo" name="re_correo" required placeholder="Ingrese su correo" style="width: 280px;">
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-form-label">Nueva contraseña</label>
              <input type="password" class="form-control" id="re_contra1" name="re_contra1" required placeholder="Nueva contraseña" style="width: 280px;">
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-form-label">Confirmar contraseña</label>
              <input type="password" class="form-control" id="re_contra2" name="re_contra2" required placeholder="Confirmar contraseña" style="width: 280px;">
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" id="resetear" class="btn btn-primary">Cambiar</button>
          <button type="button" id="CerrarReset" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/revslider.js"></script>
  <script type="text/javascript" src="js/common.js"></script>

  <script type="text/javascript" src="js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="js/jquery.mobile-menu.min.js"></script>
  <script type="text/javascript" src="js/funciones.js"></script>
  <script type="text/javascript" src="js/cambiar_clave.js"></script>
</body>
<script>
  $('.numeros').on('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
  });

  function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial)
      return false;
  }

  function limpia() {
    var val = document.getElementById("miInput").value;
    var tam = val.length;
    for (i = 0; i < tam; i++) {
      if (!isNaN(val[i]))
        document.getElementById("miInput").value = '';
    }
  }
</script>

</html>