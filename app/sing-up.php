<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Registrarse | Segebuco</title>
  <?php include_once 'includes/head.php'; ?>
  <link rel="stylesheet" type="text/css" href="css/toastr.min.css">
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
            <h2>Registrarse</h2>
          </div>
          <fieldset class="col2-set">
            <div class="col-md-12">
              <div class="content">
                <div class="add_info">
                  <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                    <li class="active"> <a href="#persona" data-toggle="tab">Persona Natural</a> </li>
                    <li><a href="#empresa" data-toggle="tab">Empresa</a></li>
                  </ul>
                  <div id="productTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="persona">
                      <form id="form_nuevo">
                        <ul class="form-list">
                          <li>
                            <input type="text" placeholder="Nombres" title="Nombres" id="nombres" class="input-text required-entry validate-password" name="nombres" onkeypress="return soloLetras(event)" required>
                          </li>
                          <li>
                            <input type="text" placeholder="Apellido Paterno" title="Apellido Paterno" id="a_paterno" class="input-text required-entry validate-password" name="a_paterno" onkeypress="return soloLetras(event)" required>
                          </li>
                          <li>
                            <input type="text" placeholder="Apellido Materno" title="Apellido Materno" id="a_materno" class="input-text required-entry validate-password" name="a_materno" onkeypress="return soloLetras(event)" required>
                          </li>
                          <li>
                            <input type="text" placeholder="DNI" title="DNI" id="dni" class="numeros input-text required-entry validate-password" name="dni" maxlength="8" required>
                          </li>
                          <li>
                            <input type="text" placeholder="Celular" title="Celular" id="celular" class="numeros input-text required-entry validate-password" name="celular" maxlength="9" required>
                          </li>
                          <li>
                            <input type="email" placeholder="Correo Electrónico" title="Correo Electrónico" class="input-text required-entry" id="email" value="" name="email" required>
                          </li>
                          <li>
                            <input type="password" placeholder="Contraseña" title="Contraseña" id="pass" class="input-text required-entry validate-password" name="pass" required>
                          </li>
                        </ul>
                        <br>
                        <div class="buttons-set">
                          <button type="submit" class="button create-account" type="button"><span>Registrarse</span></button>
                        </div>
                      </form>
                    </div>
                    <div class="tab-pane fade" id="empresa">
                      <form id="form_empresa">
                        <ul class="form-list">
                          <div class="row">
                            <div class="col-md-6">
                              <li>
                                <input type="text" placeholder="Nombre comercial de la empresa" title="" id="nombre_comercial" class="input-text required-entry validate-password" name="nombre_comercial" required>
                              </li>
                            </div>
                            <div class="col-md-6">
                              <li>
                                <input type="text" placeholder="Razon social" title="" id="razon_social" class="input-text required-entry validate-password" name="razon_social" required>
                              </li>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <li>
                                <input type="text" placeholder="RUC" title="" id="ruc" class="numeros input-text required-entry validate-password" name="ruc" maxlength="11" required>
                              </li>
                            </div>
                            <div class="col-md-6">
                              <li>
                                <input type="text" placeholder="Nombre del titular/dueño de la empresa" title="" id="nombre_titular" class="input-text required-entry validate-password" name="nombre_titular" onkeypress="return soloLetras(event)" required>
                              </li>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <li>
                                <input type="text" placeholder="Apellido del titular/dueño de la empresa" title="" id="apellido_titular" class="input-text required-entry validate-password" name="apellido_titular" onkeypress="return soloLetras(event)" required>
                              </li>
                            </div>
                            <div class="col-md-6">
                              <li>
                                <input type="text" placeholder="Dirección" title="" id="direccion_e" class="input-text required-entry validate-password" name="direccion_e" required>
                              </li>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <li>
                                <select class="validate-select" id="departamento" name="departamento" style="width:80%;" required>
                                  <option selected disabled>-- Seleccione Departamento --</option>
                                </select>
                              </li>
                            </div>
                            <div class="col-md-6">
                              <li>
                                <select class="validate-select" id="provincia" name="provincia" style="width:80%;" required>
                                  <option value="" selected>-- Seleccione Provincia --</option>
                                </select>
                              </li>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6" style="margin-top:5px;">
                              <li>
                                <select class="validate-select" id="distrito" name="distrito" style="width:80%; " required>
                                  <option value="" selected>-- Seleccione Distrito--</option>
                                </select>
                              </li>
                            </div>
                            <div class="col-md-6">
                              <li>
                                <input type="email" placeholder="Correo Electrónico" title="" class="input-text required-entry" id="email_e" value="" name="email_e" required>
                              </li>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <li>
                                <input type="text" placeholder="Celular" title="" id="celular_e" class="numeros input-text required-entry validate-password" name="celular_e" maxlength="9" required>
                              </li>
                            </div>
                            <div class="col-md-6">
                              <li>
                                <input type="password" placeholder="Contraseña" title="" id="pass_e" class="input-text required-entry validate-password" name="pass_e" required>
                              </li>
                            </div>
                          </div>

                          <div class="page-title">
                            <h2>DATOS DE CONTACTOS</h2>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <li>
                                <input type="text" placeholder="NOMBRES" onkeypress="return soloLetras(event)" id="contacto_nombre" class="input-text required-entry validate-password" name="contacto_nombre" required>
                              </li>
                            </div>
                            <div class="col-md-6">
                              <li>
                                <input type="text" placeholder="APELLIDO PATERNO" onkeypress="return soloLetras(event)" id="contacto_apellidoP" class="input-text required-entry validate-password" name="contacto_apellidoP" required>
                              </li>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <li>
                                <input type="text" placeholder="APELLIDO MATERNO" onkeypress="return soloLetras(event)" id="contacto_apellidoM" class="input-text required-entry validate-password" name="contacto_apellidoM" required>
                              </li>
                            </div>
                            <div class="col-md-6">
                              <li>
                                <input type="text" placeholder="DNI"  maxlength="8" id="contacto_dni" class="numeros input-text required-entry validate-password" name="contacto_dni" required>
                              </li>
                            </div>
                          </div>

                          <div class="row">
                          <div class="col-md-6">
                              <li>
                                <input type="text" placeholder="CELULAR" maxlength="9" id="contacto_celular" class="numeros input-text required-entry validate-password" name="contacto_celular" required>
                              </li>
                            </div>
                            <div class="col-md-6">
                              <li>
                                <input type="text" placeholder="CARGO" title="" id="contacto_cargo" class="input-text required-entry validate-password" name="contacto_cargo" required>
                              </li>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-6">
                              <li>
                                <input type="email" placeholder="CORREO" title="" id="contacto_correo" class="input-text required-entry validate-password" name="contacto_correo" required>
                              </li>
                            </div>
                          </div>
                        </ul>
                        <br>
                        <div class="buttons-set">
                          <button type="submit" class="button create-account" type="button"><span>Registrarse</span></button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </fieldset>
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
  <script type="text/javascript" src="js/toastr.min.js"></script>
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