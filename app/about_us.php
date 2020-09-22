<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Nosotros | Segebuco</title>
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
                <h2>Sobre Nosotros</h2>
              </div>
              <div class="static-contain">
                <p class="text-justify">
                  Somos una empresa integradora de soluciones tecnológicas, especialistas en el rubro de la seguridad electrónica, trabajamos con tecnología de punta para ofrecerle un mejor servicio, empleando productos de alto rendimiento y video de alta calidad, acceso remoto y facilidad de uso, brindamos la asesoría adecuada para cubrir las satisfacciones de cada uno de nuestros clientes.
                </p>
              </div>
            </div>
            <div class="col-main">
              <div class="page-title">
                <h2>Misión</h2>
              </div>
              <div class="static-contain">
                <p class="text-justify">
                  Somos una empresa de consultoría y implementación
                  tecnológica para proyectos e ingeniería de software y
                  hardware, comprometidos con nuestros clientes en la
                  ejecución de proyectos dentro del alcance, plazo y presupuesto
                  previsto; cumpliendo estándares de calidad, respeto del
                  medio ambiente, responsabilidad social, seguridad y
                  salud en el trabajo; así mismo, reconocemosel esfuerzo,
                  trabajo en equipo y compromiso de nuestros colaboradores,
                  promoviendo oportunidades de desarrollo personal y profesional.
                </p>
              </div>
            </div>
            <div class="col-main">
              <div class="page-title">
                <h2>Visión</h2>
              </div>
              <div class="static-contain">
                <p class="text-justify">
                  Ser una empresa lider en asesoría y construcción de proyectos tecnológicos e industriales,
                  reconocidos a nivel nacional por nuestra alta competitividad
                  profesional y experiencia, desarrollando fuertes y duraderas
                  relaciones de confianza con sus clientes a nivel corporativo.
                </p>
              </div>
            </div>
          </section>
          <div class="col-lg-3 col-sm-3 col-xs-12 pro-banner">
            <img alt="banner" src="images/banners/nosotros.webp">
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