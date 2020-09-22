<!-- Load Facebook SDK for JavaScript -->
<a class="appWhatsapp" target="_blank" href="https://api.whatsapp.com/send?phone=51943379829&text=Hola,&nbsp;me&nbsp;pueden ayudar?">
  <img src="/images/whatsapp.png" alt="" srcset="">
</a>
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml: true,
      version: 'v5.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s);
    js.id = id;
    js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your customer chat code -->
<div class="fb-customerchat" attribution=setup_tool page_id="2193438657639320">
</div>
<footer>
  <!-- <div class="footer-add"> <a href="#"><img src="images/banners/footer-banner.png" alt="download"> </a> </div> -->
  <div class="footer-inner">
    <div class="container">

      <div class="row">
        <div class="col-sm-8 col-xs-12 col-lg-9">
          <div class="footer-column pull-left">
            <h4>Secciones</h4>
            <ul class="links">
              <li class="first"><a href="/productos" title="">Catálogos</a></li>
              <li><a href="/promociones" title="">Promociones</a></li>
            </ul>
          </div>
          <div class="footer-column pull-left">
            <h4>Atención al Cliente</h4>
            <ul class="links">
              <!-- <li class="first"><a href="mi_cuenta" title="">Mi cuenta</a></li> se mostrara cuando se logueo-->
              <li><a href="/terminos_condiciones" title="">Tiempos y costos de envío</a></li>
              <li><a href="/cambios_devoluciones" title="">Cambios y devoluciones</a></li>
              <!-- <li><a href="" title="">Términos y condiciones</a></li> -->
            </ul>
          </div>
          <div class="footer-column pull-left">
            <h4>Información</h4>
            <ul class="links">
              <!-- <li><a href="#" title="Search Terms">Search Terms</a></li> -->
              <li><a href="/about_us" title="">Nosotros</a></li>
              <li><a href="/contact_us" title="">Contáctenos</a></li>
            </ul>
          </div>
        </div>
        <div class="col-xs-12 col-lg-3 col-sm-4">
          <div class="footer-column-last">
            <div class="newsletter-wrap">
              <h4>Medios de Pagos</h4>
            </div>
            <div class="payment-accept">
              <div><img src="/images/payment-1.png" alt="payment1"> <img src="/images/payment-2.png" alt="payment2"> <img src="/images/payment-3.png" alt="payment3"> <img src="/images/payment-4.png" alt="payment4"> </div>
            </div>
          </div>
          <div class="footer-column-last">
            <div class="newsletter-wrap">
              <h4>Síguenos en</h4>
            </div>
            <div class="payment-accept">
              <div>
                <a href="https://www.facebook.com/NickRackchimbote/" target="_blank"><img src="/images/facebook.png" alt="Facebook" style="height: 33px; width:40px;"></a>
                <a href="https://www.instagram.com/"><img src="/images/instagram.png" alt="Facebook" style="height: 33px; width:40px;"></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <address>
          <!-- <span> <i class="fa fa-map-marker"></i> ABC Town Luton Street, New York 226688 </span> <span><i class="fa fa-mobile"></i> + 0800 567 345</span> <span><i class="fa fa-envelope"></i> support@themessoft.com</span> -->
          <span>Copyright &reg; 2020 Social Marketing Online - Todos los derechos reservados.</span>
        </address>
      </div>
    </div>
  </div>
</footer>