<?php
session_start();
// print_r($_SESSION);
if (!isset($_SESSION['active'])) {
  header('location: home');
}
require_once 'class/conexion.php';
require_once 'class/Pedido.php';
require_once 'class/Detalle_pedido.php';

$cl_pedido = new Pedido();
$cl_detalle_pedido = new Detalle_pedido();


if (isset($_GET['id']) and !empty($_GET['id'])) {

  $verificar = $cl_pedido->verificar($_GET['id'], $_SESSION['id_cliente']);
  if (!$verificar) {
    header('location: mi_cuenta');
  } else {
    $cl_detalle_pedido->setPedido_id($_GET['id']);
    $row_detalle_pedidos = $cl_detalle_pedido->ver_detalle_pedido();

    $cl_pedido->setId($_GET['id']);
    $cl_pedido->ver_detalle_pedido_destino();
  }
} else {
  header('location: mi_cuenta');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Detalle Pedido | Segebuco</title>
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="segebuco.com ofrecemos venta e instalación de camaras de seguridad para empresas y viviendas. Ofrecemos controles de asistencia, control de acceso, alarmas, camaras ip, racks, cableado estructurado">
  <meta name="keywords" content="ventas de camaras analogicas, ventas de camaras ip, dvr, xvr, sistemas de seguridad, racks, cables utp,
tienda online, cableado estructurado, mantenimiento camaras chimbote Perú">
  <meta name="author" content="SEGEBUCO S.A.C.">
  <meta name="copyright" content="SEGEBUCO S.A.C.">

  <!-- Favicons Icon -->
  <link rel="icon" href="images/icono/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="images/icono/favicon.ico" type="image/x-icon" />

  <link rel="apple-touch-icon" sizes="57x57" href="/images/icono/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="/images/icono/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="/images/icono/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="/images/icono/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="/images/icono/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="/images/icono/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="/images/icono/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="/images/icono/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="/images/icono/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192" href="/images/icono/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/images/icono/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/images/icono/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/images/icono/favicon-16x16.png">
  <link rel="manifest" href="/images/icono/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <!-- Mobile Specific -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- CSS Style -->
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/css/font-awesome.css" media="all">
  <link rel="stylesheet" type="text/css" href="/css/simple-line-icons.css" media="all">
  <link rel="stylesheet" type="text/css" href="/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="/css/owl.theme.css">
  <link rel="stylesheet" type="text/css" href="/css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="/css/jquery.mobile-menu.css">
  <link rel="stylesheet" type="text/css" href="/css/revslider.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css" media="all">
  <!-- Google Fonts -->
  <link href='/css/letras.css' rel='stylesheet' type='text/css'>
  <style>
    ::-webkit-input-placeholder {
      /* WebKit, Blink, Edge */
      color: #ccc;
    }

    :-moz-placeholder {
      /* Mozilla Firefox 4 to 18 */
      color: #ccc;
      opacity: 1
        /* esto es porque Firefox le reduce la opacidad por defecto */
      ;
    }

    ::-moz-placeholder {
      /* Mozilla Firefox 19+ */
      color: #ccc;
      opacity: 1;
    }

    :-ms-input-placeholder {
      /* Internet Explorer 10-11 */
      color: #ccc;
    }
  </style>

  <link rel="stylesheet" type="text/css" href="/css/social.css" media="all">
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

<body class="shopping-cart-page">
  <div id="page">
    <header>
      <?php include_once 'includes/header.php'; ?>
    </header>
    <div class="main-container col2-right-layout">
      <div class="main container">
        <div class="row">
          <section class="col-sm-9 wow bounceInUp animated">
            <div class="col-main">
              <div class="my-account">
                <div class="page-title">
                  <h2>DETALLE DEL PEDIDO: <em>#<?php echo $cl_pedido->getNum_pedido(); ?></em></h2>
                </div>
                <div class="dashboard">
                  <div class="recent-orders">
                    <div class="title-buttons"><strong>PRODUCTOS</strong></div><br><br>
                    <div class="table-responsive">
                      <table class="data-table" id="my-orders-table">
                        <col>
                        <col>
                        <col>
                        <col>
                        <col width="1">
                        <thead>
                          <tr class="first last">
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th><span class="nobr">Total</span></th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $total = 0;
                          foreach ($row_detalle_pedidos as $fila) { ?>
                            <tr class="first odd">
                              <td style="vertical-align:middle;" class="image"><a class="product-image" href="javascript:void(0)"><img width="75" alt="" src="/images/productos/<?php echo $fila['foto']; ?>"></a> <?php echo $fila['codigo']; ?></td>
                              <td style="vertical-align:middle;"><?php echo $fila['cantidad']; ?></td>
                              <td style="vertical-align:middle;">S/.<?php echo number_format($fila['precio'], 2); ?></td>
                              <td style="vertical-align:middle;"><span class="price">S/.<?php echo number_format($fila['cantidad'] * $fila['precio'], 2) ?></span></td>
                              </td>
                            </tr>
                          <?php $total = $total + ($fila['precio'] * $fila['cantidad']);
                          }
                          ?>
                        </tbody>
                        <tr>
                          <th></th>
                          <th></th>
                          <th>
                            <h4>SubTotal</h4>
                          </th>
                          <th>
                            <h4>S/.<?php echo number_format($total, 2); ?></h4>
                          </th>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="box-account">
                    <div class="page-title">
                      <h2>Datos del Destinatario</h2>
                    </div>
                    <section class="col-sm-9 wow bounceInUp animated">
                      <div class="col-main">
                        <div class="static-contain">
                          <form id="">
                            <?php
                            if ($_SESSION['tipo'] == 1) {
                              include_once 'includes/detalle_persona.php';
                            } else {
                              include_once 'includes/detalle_empresa.php';
                            }
                            ?>
                          </form>
                        </div>
                      </div>
                    </section>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <?php include_once 'includes/footer.php'; ?>
  </div>
  <?php include_once 'includes/menu_mobile.php'; ?>
  <script type="text/javascript" src="/js/jquery.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/js/revslider.js"></script>
  <script type="text/javascript" src="/js/common.js"></script>

  <script type="text/javascript" src="/js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="/js/jquery.mobile-menu.min.js"></script>
  <script type="text/javascript" src="/js/funciones.js"></script>
</body>

</html>