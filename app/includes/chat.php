<!-- Load Facebook SDK for JavaScript -->
<a class="appWhatsapp" target="_blank" href="https://api.whatsapp.com/send?phone=51943379829&text=Hola,&nbsp;me&nbsp;pueden ayudar?">
  <img src="images/whatsapp.png" alt="" srcset="">
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