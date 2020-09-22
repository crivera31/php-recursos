<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cambios y Devoluciones | Segebuco</title>
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
        <div class="main-container col2-right-layout">
            <div class="main container">
                <div class="row">
                    <section class="col-sm-9 wow bounceInUp animated">
                        <div class="col-main">
                            <div class="page-title">
                                <h2>Política de cambios y devoluciones</h2>
                            </div>
                            <div class="static-contain">
                                <p class="text-justify">
                                    <b>¿Qué debo hacer para realizar un cambio o devolución de producto?</b><br>
                                    Si tiene alguna falla el producto, consulte con el área de Soporte Técnico   llamando a su promotor de ventas asignado.
                                    Recuerda que todos nuestros productos cuentan con términos y tiempos de garantía de su fabricante, 
                                    los cuales son aplicados en caso ocurriera alguna falla.
                                </p><br>
                                <p class="text-justify">
                                    <b>¿Cuánto se demoran en devolver mi dinero?</b><br>
                                    Si realizas la compra en tiendas: consultar con el punto de venta mas cercano.<br>
                                    Si realizas la compra en nuestra web: El plazo máximo es 10 a 15 días calendario después
                                    de la fecha de entrega de tu pedido.
                                </p>
                            </div>
                        </div>
                    </section>
                    <div class="col-lg-3 col-sm-3 col-xs-12 pro-banner">
                        <img alt="banner" src="images/banners/cambio_devolucion.webp">
                    </div>
                </div>
            </div>
        </div>
        <!--End main-container -->
        <?php include_once 'includes/footer.php'; ?>
    </div>
    <?php include_once 'includes/menu_mobile.php'; ?>
    <!-- JavaScript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/revslider.js"></script>
    <script type="text/javascript" src="js/common.js"></script>

    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/jquery.mobile-menu.min.js"></script>
</body>

</html>