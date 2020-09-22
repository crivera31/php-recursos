<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contáctenos | Segebuco</title>
  <?php include_once 'includes/head.php'; ?>
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
              <!-- <div class="page-title">
                <h2>Contact Us</h2>
              </div> -->
              <div class="category-products">
                <ul class="products-grid" id="itemContainer" style="min-height: 0px;">
                  <li class="item col-lg-6 col-md-3 col-sm-4 col-xs-6 animated flipInX">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info">
                          <a target="_blank" href="detalle_producto?codigo=BLOG-03" title="" class="product-image">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.890650386005!2d-78.59089656046402!3d-9.073725788206348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ab8115a7dd2087%3A0x7b15ede53ea555c8!2sNick%20Rack%20Chimbote%20Soporte%20Tv!5e0!3m2!1ses!2spe!4v1576649244693!5m2!1ses!2spe" width="600" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                          </a>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="item col-lg-6 col-md-3 col-sm-4 col-xs-6 animated flipInX">
                    <div class="item-inner">
                      <div class="item-img">
                        <div class="item-img-info">
                          <a target="_blank" href="detalle_producto?codigo=BLOG-03" title="" class="product-image">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.9065003214423!2d-78.59214618582327!3d-9.072282393490834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ab8115ea4e506d%3A0x9764c11045eec4be!2sJir%C3%B3n%20Manuel%20Ruiz%20646%2C%20Chimbote%2002803!5e0!3m2!1ses-419!2spe!4v1577388811165!5m2!1ses-419!2spe" width="550" height="350" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                          </a>
                        </div>
                      </div>
                    </div>
                  </li>
                </ul>
                <div class="static-contain">
                  <div class="col-md-6 col-sm-4">
                    <p style="font-size: 16px;">
                      <i class="fa fa-envelope fa-1x" aria-hidden="true" style="color:#167bcb; margin-bottom:10px;"></i>&nbsp;
                      <span>Escríbenos:</span>
                      <span style="padding-left: 25px; display:block; margin-top: -12px;">ventas@segebuco.com</span>
                      <span style="padding-left: 25px; display:block; margin-top: -7px;">info@segebuco.com</span><br>

                      <i class="fa fa-phone fa-lg" aria-hidden="true" style="color:#167bcb; margin-bottom:10px;"></i>&nbsp;
                      <span>Llámanos</span>
                      <span style="padding-left: 25px; display:block; margin-top: -12px;">943 379829 - 959 646364</span><br>

                      <i class="fa fa-building fa-lg" aria-hidden="true" style="color:#167bcb; margin-bottom:10px;"></i>&nbsp;
                      <span>Visítanos</span>
                      <span style="padding-left: 25px; display:block; margin-top: -12px;">De Lunes a Viernes de 08:00 am a 10:00 pm</span><br>
                      <span style="padding-left: 25px; display:block; margin-top: -26px;">Sábados de 08:00 am a 01:00 pm</span><br>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </section>
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