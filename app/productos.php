<?php
session_start();
require_once 'class/conexion.php';
require_once 'class/Categoria.php';
require_once 'class/Producto.php';
require_once 'procesos/menu_categorias2.php';

$ArbolMenu = arboldeCategoriasLista();
$cl_producto = new Producto();
$cl_categoria = new Categoria();
$row_productos = $cl_producto->Mostrar_TODO();

if (isset($_GET['search'])) {
  $search = $_GET['search'];
  $row_productos = $cl_producto->search($search);
}
if (isset($_GET['nivel'])) {
  if ($_GET['nivel'] == "seccion") {
    $codigo = $_GET['id'];
    $cl_categoria->setCodigo($codigo);
    $cl_producto->setCategoria_id($codigo);
    // $result = $cl_producto->Count_productos();
    $row_productos = $cl_producto->Mostrar_productos($codigo);
    $cl_categoria->Breadcrumbs();
  }
  if ($_GET['nivel'] == "categoria") {
    $codigo = $_GET['id'];
    $cl_categoria->setCodigo($codigo);
    $row_productos = $cl_producto->Mostrar_x_padreID($codigo);
    $cl_categoria->Breadcrumbs1();
  }
}
// if (isset($_GET['id'])) { 
//seccion
// $codigo = $_GET['id'];
// echo 'seccion';
// $cl_categoria->setCodigo($codigo);
// $cl_producto->setCategoria_id($codigo);
// // $result = $cl_producto->Count_productos();
// $row_productos = $cl_producto->Mostrar_productos($codigo);
// $cl_categoria->Breadcrumbs();
// }
// if (isset($_GET['id'])) { 
//categoria
// $codigo = $_GET['id'];
// echo 'categoria';
// $cl_categoria->setCodigo($codigo);
// $row_productos = $cl_producto->Mostrar_x_padreID($codigo);
// $cl_categoria->Breadcrumbs1();
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Productos | Segebuco</title>
  <meta http-equiv="Cache-Control" content="no-cache" />
  <meta http-equiv="Pragma" content="no-cache" />
  <meta http-equiv="Expires" content="0" />

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
  <style>
    .holder {
      margin: 15px 0;
    }

    .holder a {
      font-size: 14px;
      cursor: pointer;
      margin: 0 5px;
      color: #333;
    }

    .holder a:hover {
      /* background-color:#167bcb; */
      color: #167bcb;
    }

    .holder a.jp-previous {
      margin-right: 15px;
    }

    .holder a.jp-next {
      margin-left: 15px;
    }

    .holder a.jp-current,
    a.jp-current:hover {
      color: #167bcb;
      font-weight: bold;
    }

    .holder a.jp-disabled,
    a.jp-disabled:hover {
      color: #bbb;
    }

    .holder a.jp-current,
    a.jp-current:hover,
    .holder a.jp-disabled,
    a.jp-disabled:hover {
      cursor: default;
      background: none;
    }

    .holder span {
      margin: 0 5px;
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

<body class="category-page">
  <div id="page">
    <!-- Header -->
    <header>
      <?php include_once 'includes/header.php'; ?>
    </header>
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <ul>

              <?php if (isset($_GET['nivel'])) { ?>
                <?php if ($_GET['nivel'] == "categoria") { ?>
                <li class="home"> <a href="index.php" title="Go to Home Page">Inicio</a> <span>/ </span></li>
                <li class="category1599"> <a href="javascript:void(0);" title=""><?php echo $cl_categoria->getPadre(); ?></a> <span>/ </span> </li>
                <li class="category1600"> <a href="javascript:void(0);" title=""><?php echo $cl_categoria->getCategoria(); ?></a> <span></span> </li>
              <?php } ?>
              <?php if ($_GET['nivel'] == "seccion") { ?>
                <li class="home"> <a href="index.php" title="Go to Home Page">Inicio</a> <span>/ </span></li>
                <li class="category1599"> <a href="javascript:void(0);" title=""><?php echo $cl_categoria->getPadre(); ?></a> <span>/ </span> </li>
                <li class="category1600"> <a href="javascript:void(0);" title=""><?php echo $cl_categoria->getCategoria(); ?></a> <span>/ </span> </li>
                <li class="category1600"> <a href="javascript:void(0);" title=""><?php echo $cl_categoria->getSeccion(); ?></a> <span></span> </li>
              <?php } 
                }
              ?>

            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Breadcrumbs End -->

    <!-- Main Container -->
    <section class="main-container col2-left-layout bounceInUp animated">
      <div class="container">
        <div class="row">
          <div class="col-sm-9 col-sm-push-3">
            <div class="category-description std">
              <div class="slider-items-products">
                <div id="category-desc-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col1 owl-carousel owl-theme">
                    <?php
                    $carpeta = "images/banners/categoria/";
                    if (is_dir($carpeta)) {
                      if ($dir = opendir($carpeta)) {
                        while (($archivo = readdir($dir)) !== false) {
                          if ($archivo != '.' && $archivo != '..' && $archivo != '.htaccess') {
                    ?>
                            <div class="item"> <a href="#"><img alt="" src="/images/banners/categoria/<?php echo $archivo ?>"></a>
                            </div>
                    <?php
                          }
                        }
                        closedir($dir);
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>
            </div>

            <?php if (isset($_GET['search'])) { ?>
              <h2 class="page-heading">
                <?php if (count($row_productos) == 0) { ?>
                  <span class="page-heading-title">La búsqueda de '<?php echo $_GET['search']; ?>' no obtuvo ningún resultado.</span>
                <?php } else { ?>
                  <span class="page-heading-title">Resultados de búsqueda para '<?php echo $_GET['search']; ?>'</span>
                <?php } ?>
              </h2>
            <?php } ?>

            <article class="col-main">
              <?php if (count($row_productos) != 0) { ?>
                <div class="toolbar" style="margin-bottom: 30px;">
                  <div class="row">
                    <div class="col-md-6 col-md-offset-4">
                      <!--col-md-4 col-md-offset-4-->
                      <div class="holder">
                        <!-- paginacion-->
                      </div>
                    </div>
                  </div>
                </div>
              <?php } ?>
              <div class="category-products">
                <ul class="products-grid" id="itemContainer">
                  <?php foreach ($row_productos as $fila) { ?>
                    <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                      <div class="item-inner">
                        <div class="item-img">
                          <div class="item-img-info"><a target="_blank" href="/detalle_producto/<?php echo $fila['codigo']; ?>" title="" class="product-image"><img src="/images/productos/<?php echo $fila['foto']; ?>" alt="Retis lapen casen"></a>
                            <?php if ($fila['nuevo'] == 1) { ?>
                              <div class="new-label new-top-left">Nuevo</div>
                            <?php } ?>
                          </div>
                        </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="" target="_blank" href="/detalle_producto/<?php echo $fila['codigo']; ?>"> <?php echo $fila['codigo']; ?> </a> </div>
                            <div class="item-content">
                              <div class="item-price">
                                <?php //if(isset($_SESSION['active'])){ 
                                ?>
                                <?php //} 
                                ?>
                              </div>
                              <!-- <div class="action">
                                <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Añadir al Carrito</span></button>
                              </div> -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </article>
            <!--	///*///======    End article  ========= //*/// -->
          </div>
          <div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
            <aside class="col-left sidebar">
              <div class="side-nav-categories">
                <div class="block-title"> Categorias </div>
                <!--block-title-->
                <!-- BEGIN BOX-CATEGORY -->
                <div class="box-content box-category">
                  <ul>
                    <?php
                    foreach ($ArbolMenu as $arbol) {
                      echo  $arbol;
                    }
                    ?>
                  </ul>
                </div>
              </div>
              <?php
              $carpeta = "images/banners/banner-categoria/";
              if (is_dir($carpeta)) {
                if ($dir = opendir($carpeta)) {
                  while (($archivo = readdir($dir)) !== false) {
                    if ($archivo != '.' && $archivo != '..' && $archivo != '.htaccess') {
              ?>
                      <div class="hot-banner"><img alt="" src="/images/banners/banner-categoria/<?php echo $archivo ?>"></div>
              <?php
                    }
                  }
                  closedir($dir);
                }
              }
              ?>
            </aside>
          </div>
        </div>
      </div>
    </section>
    <?php include_once 'includes/footer.php'; ?>
  </div>
  <?php include_once 'includes/menu_mobile.php'; ?>
  <script type="text/javascript" src="/js/jquery.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/js/common.js"></script>
  <script type="text/javascript" src="/js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="/js/jquery.mobile-menu.min.js"></script>

  <script type="text/javascript" src="/paginacion-js/highlight.pack.js"></script>
  <script type="text/javascript" src="/paginacion-js/tabifier.js"></script>
  <script src="/paginacion-js/js.js"></script>
  <script src="/paginacion-js/jPages.js"></script>

  <script>
    jQuery(document).ready(function($) {
      $("div.holder").jPages({
        containerID: "itemContainer"
      });
    });
  </script>
</body>

</html>