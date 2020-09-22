<?php
session_start();
if (!isset($_SESSION['active'])) {
  header('location: home');
}
if (!isset($_SESSION['carrito'])) {
  header('location: home');
}
require_once 'class/conexion.php';
require_once 'class/Cliente.php';
$cl_cliente = new Cliente();

$cl_cliente->setId($_SESSION['id_cliente']);
// $cl_cliente->Profile();
if ($_SESSION['tipo'] == 1) {
  $cl_cliente->Profile_persona();
} else {
  $cl_cliente->Profile_empresa();
}

//total del carrito
$total = 0;
$amount = 20;
$ship = 0;
$title = 'Tu pedido';
foreach ($_SESSION['carrito'] as $key => $producto) {
  $total = $total + ($producto['precio'] * $producto['cantidad']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Proceso de compra | Segebuco</title>
  <?php include_once 'includes/head.php'; ?>
  <style type="text/css">
    body {
      font-family: 'Varela Round', sans-serif;
    }

    .modal-confirm {
      color: #636363;
      /* width: 325px; */
    }

    .modal-confirm .modal-content {
      padding: 20px;
      border-radius: 5px;
      border: none;
    }

    .modal-confirm .modal-header {
      border-bottom: none;
      position: relative;
    }

    .modal-confirm h4 {
      text-align: center;
      font-size: 26px;
      margin: 30px 0 -15px;
    }

    .modal-confirm .form-control,
    .modal-confirm .btn {
      min-height: 40px;
      border-radius: 3px;
    }

    .modal-confirm .close {
      position: absolute;
      top: -5px;
      right: -5px;
    }

    .modal-confirm .modal-footer {
      border: none;
      text-align: center;
      border-radius: 5px;
      font-size: 13px;
    }

    .modal-confirm .icon-box {
      color: #fff;
      position: absolute;
      margin: 0 auto;
      left: 0;
      right: 0;
      top: -70px;
      width: 95px;
      height: 95px;
      border-radius: 50%;
      z-index: 9;
      background: #167bcb;
      padding: 15px;
      text-align: center;
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
    }

    .modal-confirm .icon-box i {
      font-size: 58px;
      position: relative;
      top: 3px;
    }

    .modal-confirm.modal-dialog {
      margin-top: 80px;
    }

    .modal-confirm .btn {
      color: #fff;
      border-radius: 4px;
      background: #167bcb;
      text-decoration: none;
      transition: all 0.4s;
      line-height: normal;
      border: none;
    }

    .modal-confirm .btn:hover,
    .modal-confirm .btn:focus {
      background: #167bcb;
      outline: none;
    }

    .trigger-btn {
      display: inline-block;
      margin: 100px auto;
    }
  </style>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156571536-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-156571536-1');
  </script>

</head>


<body class="checkout-page">
  <div id="page">
    <header>
      <?php include_once 'includes/header.php'; ?>
    </header>
    <div class="main-container col2-right-layout">
      <div class="main container">
        <div class="row">
          <div id="content"></div>
          <?php
          if ($_SESSION['tipo'] == 1) {
            include_once 'includes/datos_compra_persona.php';
          } else {
            include_once 'includes/datos_compra_empresa.php';
          }

          ?>
          <aside class="col-right sidebar col-sm-3 wow bounceInUp animated">
            <div class="block block-progress">
              <div class="block-title">Tu pedido</div>
              <div class="block-content">
                <dl>
                  <ul class="mini-products-list" id="">
                    <?php

                    foreach ($_SESSION['carrito'] as $key => $producto) {
                    ?>
                      <li class="">
                        <p class="price"><?php echo $producto['codigo']; ?></p>
                        <strong class=""><?php echo $producto['cantidad']; ?> x <span class="price"> S/.<?php echo $producto['precio']; ?></span><span class="price"> = S/.<?php echo number_format($producto['precio'] * $producto['cantidad'], 2); ?></span></strong>
                      </li>
                      <hr>
                    <?php

                    }
                    // $subtotal = $total / 1.18;
                    $igv = ($total * 18) / 118;
                    $total_f = $total - $igv;
                    ?>
                  </ul>
                  <dd class="complete"><strong>IGV(18%): </strong>
                    <span class="">S/.<?php echo number_format($igv, 2); ?></span> </dd>
                  <dd class="complete"><strong>SUBTOTAL: </strong>
                    <span class="">S/.<?php echo number_format($total_f, 2) ?></span> </dd>
                  <dd class="complete"><strong>TOTAL A PAGAR: </strong>
                    <span class="">S/.<?php echo number_format($total, 2) ?></span> </dd>
                </dl>
              </div>
            </div>
          </aside>
        </div>
      </div>
    </div>
    <?php include_once 'includes/footer.php'; ?>
  </div>
  <?php include_once 'includes/menu_mobile.php'; ?>
  <!-- Modal HTML -->
  <div id="myModal" class="modal fade" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-confirm">
      <div class="modal-content">
        <div class="modal-header">
          <div class="icon-box">
            <i class="fa fa-check"></i>
          </div>
          <h4 class="modal-title">Su pedido ha sido procesado!</h4>
        </div>
        <div class="modal-body text-justify">
          <p class="text-center">
            Número del pedido: <b id="num_pedido">2020-00006</b><br>
            Puede ver su historial de pedidos en <b>MI CUENTA</b>.<br>
            Gracias por confiar en nosotros!!<br><br>
          </p>
          <b>El pago de realiza vía depósito bancario a nuestro número de cuenta Banco de Crédito 310-2081456-0-19
            a nombre de Servicios Generales Business Consulting SAC,
            su pedido no será enviado hasta que se verifique y valide de dicho pago.</b>
        </div>
        <div class="modal-footer">
          <button class="fin_proceso btn btn-success btn-block" data-dismiss="modal">OK</button>
        </div>
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
</body>

</html>