<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tiempo y costos de envio | Segebuco</title>
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
                                <h2>TIEMPOS Y COSTOS DE ENVIO </h2>
                            </div>
                            <div class="static-contain">
                                <p class="text-justify">
                                La empresa SEGEBUCO S.A.C. (en adelante, "LA EMPRESA"), identificada con RUC N°20531757590, 
                                establece las siguientes Políticas de Tiempos y Costos para el envío de productos (en adelante, 
                                las "POLÍTICAS DE TIEMPOS Y COSTOS DE ENVÍO"), a fin de permitirle a Usted, (en adelante, "EL CLIENTE"), 
                                las consideraciones sobre los costos y el tiempo de entrega de los productos que Usted adquiera a través 
                                del sitio web: "www.segebuco.com", (en adelante, "EL SITIO WEB").
                                </p><br><br>
                                <p class="text-justify">
                                Los productos adquiridos a través de la página web se sujetarán a las condiciones de despacho y entrega 
                                disponibles en el sitio. Los plazos de entrega se cuentan en días útiles laborables.
                                No hay despacho los días: sábado, domingo y feriados.
                                </p><br>
                                <p class="text-justify">
                                La información del lugar de envío es de exclusiva responsabilidad del <b>CLIENTE</b>. Por lo que será de tu
                                responsabilidad la exactitud de los datos indicados para realizar una correcta y oportuna entrega de
                                los productos a tu domicilio o dirección de envío. Si hubiera algún error en la dirección, su producto
                                podría no llegar en el dicho plazo.
                                </p><br>
                                <p class="text-justify">
                                Las compras se realizarán vía depósito bancario a nuestra cuenta, el periodo de entrega
                                será entre 10 a 15 días útiles laborables, dado que previamente deberá pasar por verificación y validación 
                                de dicho pago.
                                </p>
                            </div>
                        </div>
                    </section>
                    <div class="col-lg-3 col-sm-3 col-xs-12 pro-banner">
                        <img alt="banner" src="images/banners/costo_envio.webp">
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