<?php
session_start();

require_once 'class/conexion.php';
require_once 'class/Categoria.php';
require_once 'class/Producto.php';
require_once 'procesos/menu_categorias2.php';

$ArbolMenu = arboldeCategoriasLista();

$cl_producto = new Producto();
$cl_categoria = new Categoria();

$row_productos = $cl_producto->Mostrar_ofertas(); //carga todo los productos

if (isset($_GET['codigo'])) {
  $codigo = $_GET['codigo'];
  $cl_categoria->setCodigo($codigo);

  $cl_producto->setCategoria_id($codigo);
  $result = $cl_producto->Count_productos();

  $row_productos = $cl_producto->Mostrar_productos($codigo);
  // var_dump($row_productos);
}
// else { echo 'No se envio dato';}
$cl_categoria->Breadcrumbs();

?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Promociones | Segebuco</title>
<?php include_once 'includes/head.php'; ?>
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
  function gtag(){dataLayer.push(arguments);}
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
              <?php if (isset($_GET['codigo'])) { ?>
                <li class="home"> <a href="index.php" title="Go to Home Page">Inicio</a> <span>/ </span></li>
                <li class="category1599"> <a href="javascript:void(0);" title=""><?php echo $cl_categoria->getNombre(); ?></a> <span>/ </span> </li>
                <li class="category1600"> <a href="javascript:void(0);" title=""><?php echo $cl_categoria->getNom_hijo(); ?></a> <span></span> </li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <section class="main-container col2-left-layout bounceInUp animated">
      <div class="container">
        <div class="row">
          <div class=""> <!-- col-sm-9 col-sm-push-3-->
            <article class="col-main">
            <?php if (count($row_productos) != 0) { ?>
                <div class="toolbar" style="margin-bottom: 30px;">
                  <div class="row row container text-center">
                    <div class="col-md-4 col-md-offset-4">
                      <!--col-md-4 col-md-offset-4-->
                      <div class="holder">
                        <!-- paginacion-->
                      </div>
                    </div>
                  </div>
                </div>
              <?php } else { ?>
              <div class="row container text-center">
                <div class="alert alert-info">
                  <strong style="font-size: 1.6rem;">No hay promociones disponibles.</strong>
                </div>
              </div>
              <?php } ?>
              <div class="category-products">
                <ul class="products-grid" id="itemContainer">
                  <?php foreach ($row_productos as $fila) { ?>
                    <li class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                      <div class="item-inner">
                        <div class="item-img">
                          <div class="item-img-info"><a target="_blank" href="detalle_producto?codigo=<?php echo $fila['codigo']; ?>" title="" class="product-image"><img src="images/productos/<?php echo $fila['foto']; ?>" alt="Retis lapen casen"></a>
                            <?php if ($fila['nuevo'] == 1) { ?>
                              <div class="new-label new-top-left">Nuevo</div>
                            <?php } ?>
                          </div>
                        </div>
                        <div class="item-info">
                          <div class="info-inner">
                            <div class="item-title"> <a title="" target="_blank" href="detalle_producto.php?codigo=<?php echo $fila['codigo']; ?>"> <?php echo $fila['codigo']; ?> </a> </div>
                            <div class="item-content">
                              <div class="item-price">
                                <div class="price-box">
                                  <p class="old-price"><span class="price-label">Regular Price:</span> <span class="price">$100.00 </span> </p>
                                  <p class="special-price"><span class="price-label">Special Price</span> <span class="price">$<strong><?php echo $fila['precio_compra']; ?></strong> </span> </p>
                                </div>
                              </div>
                              <div class="action">
                                <!-- <button class="button btn-cart" type="button" title="" data-original-title="Add to Cart"><span>Añadir al Carrito</span></button> -->
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>
    <!-- Main Container End -->
    <!-- Footer -->
    <!-- Footer -->
    <?php include_once 'includes/footer.php'; ?>
  </div>
  <?php include_once 'includes/menu_mobile.php'; ?>
  <!-- JavaScript -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/common.js"></script>
  <script type="text/javascript" src="js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="js/jquery.mobile-menu.min.js"></script>

  <script type="text/javascript" src="paginacion-js/highlight.pack.js"></script>
  <script type="text/javascript" src="paginacion-js/tabifier.js"></script>
  <script src="paginacion-js/js.js"></script>
  <script src="paginacion-js/jPages.js"></script>

  <script>
    jQuery(document).ready(function($) {
      $("div.holder").jPages({
        containerID: "itemContainer",
        animation   : "flipInX"
      });
    });
  </script>
</body>

</html>