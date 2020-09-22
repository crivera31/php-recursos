    <div class="header-container">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <div class="welcome-msg"><span class="glyphicon glyphicon-map-marker"></span> Jirón Manuel Ruiz 646, Chimbote </div>
            </div>
            <div class="col-xs-6 hidden-xs">
              <div class="toplinks">
                <div class="links"><?php if (!isset($_SESSION['active'])) { ?>
                    <div class="resgistrar"><a href="/sing-up"><span class="hidden-xs">Registrarse</span></a> </div>
                    <div class="login"><a href="/login"><span class="hidden-xs">Iniciar Sesión</span></a> </div>
                  <?php } else { ?>
                    <div class="logout"><a href="/mi_cuenta"><span class="hidden-xs">Mi cuenta</span></a> </div>
                    <div class="logout"><a href="/logout"><span class="hidden-xs">Logout</span></a> </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo-block">
            <div class="logo"> <a title="SEGEBUCO S.A.C" href="/home"><img alt="SEGEBUCO S.A.C" src="/images/logo.png"> </a> </div>
          </div>
          <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12 hidden-xs">
            <div class="search-box">
              <form action="/productos" method="GET" id="search_mini_form">
                <input type="text" placeholder="¿Qué estás buscando?" maxlength="70" name="search" id="search" autocomplete="off">
                <button type="submit" class="search-btn-bg"><span class="glyphicon glyphicon-search"></span>&nbsp;</button>
              </form>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <div class="top-cart-contain pull-right">
              <div class="mini-cart">
                <div data-toggle="" data-hover="" class="basket dropdown-toggle">
                  <a href="/carrito">
                    <span class="cart_count"><?php echo (empty($_SESSION['carrito'])) ? 0 : count($_SESSION['carrito']); ?></span>
                    <span class="price">Items</span> </a> </div>
              </div>
              <!-- Top Cart -->
              <div id="ajaxconfig_info" style="display:none"> <a href="#/"></a>
                <input value="" type="hidden">
                <input id="enable_module" value="1" type="hidden">
                <input class="effect_to_cart" value="1" type="hidden">
                <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav>
      <div class="container">
        <div class="mm-toggle-wrap">
          <div class="mm-toggle"><i class="fa fa-bars"></i><span class="mm-label">Menu</span> </div>
        </div>
        <div class="nav-inner">
          <ul id="nav" class="hidden-xs">
            <li class="level0 parent drop-menu" id="nav-home"><a href="/home" class="level-top"><span>Inicio</span></a>
            </li>
            <li class="level0 nav-6 level-top drop-menu"><a href="/productos" class="level-top"><span>Ver productos</span></a>
            </li>
            <li class="level0 nav-6 level-top drop-menu"> <a class="level-top" href="/promociones"> <span>Promociones</span></a>
            </li>
            <li class="level0 nav-6 level-top drop-menu"> <a class="level-top" href="/about_us"> <span>Nosotros</span> </a>
            </li>
            <li class="level0 nav-6 level-top drop-menu"> <a class="level-top" href="/contact_us"> <span>Contáctenos</span> </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>