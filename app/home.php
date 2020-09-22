<?php
session_start();

require_once 'class/conexion.php';
require_once 'class/Producto.php';
$cl_producto = new Producto();
$result = $cl_producto->Mostrar_new_productos();

$top_5 = $cl_producto->Mostrar_5_top();

$galeria = $cl_producto->Mostrar_galeria_index();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home | Segebuco</title>
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

<body class="cms-index-index cms-home-page">
    <div id="page">
        <header>
            <?php include_once 'includes/header.php'; ?>
        </header>
        <!-- Slider -->
        <div id="thmsoft-slideshow" class="thmsoft-slideshow">
            <div class="container">
                <div class="row">
                    <div class=" col-lg-3 col-md-3 col-sm-5 col-xs-12 col-mid">
                        <div class="top-products">
                            <div class="title">Más vendidos</div>
                            <ul id="cargar_top">
                                <?php
                                foreach ($top_5 as $fila) {
                                ?>
                                    <li>
                                        <div class="row">
                                            <div class="col-xs-4 col-sm-4 no-margin"> <img alt="producto" src="images/productos/<?php echo $fila['foto']; ?>"> </div>
                                            <div class="col-xs-8 col-sm-8 no-margin"><a target="_blank" href="detalle_producto/<?php echo $fila['codigo']; ?>"><?php echo $fila['codigo']; ?></a>
                                                <?php //if (isset($_SESSION['active'])) { ?>
                                                    <!-- <div class="price">S/ <strong><?php //echo $fila['precio_venta']; ?></strong></div> -->
                                                <?php //} ?>
                                            </div>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-7 col-xs-12">
                        <div class="small-strip"><img alt="banner" src="images/banners/cabecera_slide.webp"></div>
                        <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container'>
                            <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                                <ul>
                                    <?php
                                    $carpeta = "images/banners/slide/";
                                    if (is_dir($carpeta)) {
                                        if ($dir = opendir($carpeta)) {
                                            while (($archivo = readdir($dir)) !== false) {
                                                if ($archivo != '.' && $archivo != '..' && $archivo != '.htaccess') {
                                    ?>
                                                    <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='images/banners/slide/<?php echo $archivo ?>'><img src='images/banners/slide/<?php echo $archivo ?>' alt="" data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' />
                                                    </li>
                                    <?php
                                                }
                                            }
                                            closedir($dir);
                                        }
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class=" col-lg-3 col-md-3 col-sm-7 col-xs-12">
                        <div class="image-item"> <a href="#" title="Image"> <img src="images/banners/img-02.webp" class="img-responsive" alt=""></a> </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include_once 'includes/servicios.php'; ?>
        <div class="content-page">
            <div class="container">
                <?php include_once 'includes/galeria_productos.php'; ?>
            </div>
        </div>
        <div class="brand-logo">
            <div class="container">
                <div class="slider-items-products">
                    <div id="brand-logo-slider" class="product-flexslider hidden-buttons">
                        <div class="slider-items slider-width-col6">
                            <?php
                            $carpeta = "images/marcas/";
                            if (is_dir($carpeta)) {
                                if ($dir = opendir($carpeta)) {
                                    while (($archivo = readdir($dir)) !== false) {
                                        if ($archivo != '.' && $archivo != '..' && $archivo != '.htaccess') {
                            ?>
                                            <div class="item"> <a href="#"><img src="images/marcas/<?php echo $archivo ?>" alt="Image"> </a> </div>
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
        </div>
        <?php include_once 'includes/footer.php'; ?>
    </div>
    <?php include_once 'includes/menu_mobile.php'; ?>

    <?php include_once 'includes/script.php'; ?>
</body>

</html>