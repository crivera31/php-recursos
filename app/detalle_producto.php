<?php
session_start();

require_once 'class/config.php';
require_once 'class/conexion.php';
require_once 'class/Producto.php';
$cl_producto = new Producto();

$codigo = $_GET['codigo'];
$cl_producto->setCodigo($codigo);
$cl_producto->Mostrar_detalles_producto();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="segebuco.com ofrecemos venta e instalación de camaras de seguridad para empresas y viviendas. Ofrecemos controles de asistencia, control de acceso, alarmas, camaras ip, racks, cableado estructurado">
  <meta name="keywords" content="ventas de camaras analogicas, ventas de camaras ip, dvr, xvr, sistemas de seguridad, racks, cables utp, tienda online, cableado estructurado, mantenimiento camaras chimbote Perú">
  <meta name="author" content="SEGEBUCO S.A.C.">
  <meta name="copyright" content="SEGEBUCO S.A.C.">

  <!-- Favicons Icon -->
  <link rel="icon" href="/images/icono/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="/images/icono/favicon.ico" type="image/x-icon" />

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

  <title>Detalle Producto | Segebuco</title>

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/css/font-awesome.css" media="all">
  <link rel="stylesheet" type="text/css" href="/css/simple-line-icons.css" media="all">
  <link rel="stylesheet" type="text/css" href="/css/revslider.css">
  <link rel="stylesheet" type="text/css" href="/css/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="/css/owl.theme.css">
  <link rel="stylesheet" type="text/css" href="/css/flexslider.css">
  <link rel="stylesheet" type="text/css" href="/css/jquery.mobile-menu.css">
  <link rel="stylesheet" type="text/css" href="/css/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css" media="all">
  <!-- Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:700,600,800,400|Raleway:400,300,600,500,700,800' rel='stylesheet' type='text/css'>
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

<body class="product-page">
  <div id="page">
    <!-- Header -->
    <header>
      <?php include_once 'includes/header.php'; ?>
    </header>
    <br><br>
    <section class="main-container col1-layout">
      <div class="main">
        <div class="container">
          <div class="row">
            <div class="col-main">
              <div class="product-view">
                <div class="product-essential">
                  <input id="idP" name="idP" value="<?php echo $cl_producto->getId(); ?>" type="hidden">
                  <input id="fotoP" name="idP" value="<?php echo $cl_producto->getFoto(); ?>" type="hidden">
                  <div class="product-img-box col-lg-4 col-sm-4 col-xs-12">
                    <div class="new-label new-top-left"> Nuevo </div>
                    <div class="product-image">
                      <div class="product-full"> <img id="" src="/images/productos/<?php echo $cl_producto->getFoto(); ?>" data-zoom-image="" alt="product-image" /> </div>
                    </div>
                  </div>
                  <div class="product-shop col-lg-5 col-sm-5 col-xs-12">
                    <div class="product-name">
                      <h1 id="codigoP"><?php echo $cl_producto->getCodigo(); ?></h1>
                    </div>
                    <div class="price-block">
                      <?php if (isset($_SESSION['active'])) { ?>
                        <div class="price-box">
                          <?php if ($cl_producto->getPrecio_venta() > 0) {  ?>
                            <?php if ($_SESSION['tipo'] == 1) {  ?>
                              <p class="special-price"> <span class="price-label"></span> <span id="product-price-48" class="price">S/ <strong id="precioP"><?php echo $cl_producto->getDescuento(); ?></strong></span> </p>
                            <?php } else { ?>
                              <p class="special-price"> <span class="price-label"></span> <span id="product-price-48" class="price">S/ <strong id="precioP"><?php echo $cl_producto->getPrecio_venta(); ?></strong></span> </p>
                            <?php } ?>
                          <?php } else { ?>
                            <p class="special-price"> <span class="price-label"></span> <span id="product-price-48" class="price">Contáctenos por el precio.</span> </p>
                          <?php } ?>
                          <?php //if ($cl_producto->getDescuento() > 0) {  
                          ?>
                          <!-- <p class="old-price"> <span class="price-label"></span> <span class="price">S/ <?php //echo $cl_producto->getDescuento(); ?> </span> </p> -->
                          <?php //} 
                          ?>
                          <?php if($cl_producto->getStock() > 0) {?>
                            <p class="availability in-stock pull-right"><span>in Stock</span></p>
                          <?php } else { ?>
                            <p class="availability sin-stock pull-right"><span>sin Stock</span></p>
                          <?php }  ?>
                        </div>
                      <?php } else { ?>
                        <div class="price-box">
                          <div class="alert alert-danger">
                            Registrese y inicie sesión para visualizar los precios y comprar.
                          </div>
                        </div>
                      <?php } ?>
                    </div>
                    <div class="short-description">
                      <!-- <h2>Quick Overview</h2> -->
                      <p class="text-justify"><?php echo $cl_producto->getDescripcion(); ?></p>
                    </div>
                    <?php if (isset($_SESSION['active']) && ($cl_producto->getPrecio_venta() > 0)) { ?>
                      <div class="add-to-box">
                        <div class="add-to-cart">
                          <div class="pull-left">
                            <div class="custom pull-left">
                              <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items-count" type="button"><i class="fa fa-minus">&nbsp;</i></button>
                              <input type="text" class="input-text qty" title="Qty" min="1" value="1" maxlength="999" id="qty" name="qty">
                              <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="fa fa-plus">&nbsp;</i></button>
                            </div>
                          </div>
                          <button class="add-cart button btn-cart" title="Add to Cart">Añadir al carrito</button>
                        </div>
                      </div>
                    <?php } ?>
                    <!-- <div id="mensaje_carrito"></div> -->
                  </div>
                  <div class="col-lg-3 col-sm-3 col-xs-12 pro-banner">
                    <img alt="banner" src="/images/banners/home-banner-medio.webp">
                  </div>
                </div>
              </div>
            </div>
            <div class="product-collateral col-lg-12 col-sm-12 col-xs-12">
              <div class="add_info">
                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                  <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Especificaciones </a> </li>
                </ul>
                <div id="productTabContent" class="tab-content">
                  <div class="tab-pane fade in active" id="product_tabs_description">
                    <div class="std">
                      <p><?php echo $cl_producto->getFicha_tecnica(); ?></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php include_once 'includes/footer.php'; ?>
  </div>
  <?php include_once 'includes/menu_mobile.php'; ?>
  <!-- JavaScript -->
  <script type="text/javascript" src="/js/jquery.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/js/common.js"></script>
  <script type="text/javascript" src="/js/jquery.flexslider.js"></script>
  <script type="text/javascript" src="/js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="/js/jquery.mobile-menu.min.js"></script>
  <script type="text/javascript" src="/js/cloud-zoom.js"></script>
  <script type="text/javascript" src="/js/toastr.min.js"></script>
  <script type="text/javascript" src="/js/funciones.js"></script>
</body>

</html>