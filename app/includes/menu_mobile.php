<div id="mobile-menu">
  <ul>
    <li><a href="index">Inicio</a>
    </li>
    <li><a href="productos">Ver productos</a></li>
    <li><a href="promociones">Promociones</a></li>
    <li><a href="about_us">Nosotros</a></li>
    <li><a href="contact_us">Contáctenos</a></li>
  </ul>
  <div class="top-links">
    <ul class="links">
      <?php if (!isset($_SESSION['active'])) { ?>
        <li class="last"><a href="sing-up">Registrarse</a> </li>
        <li class="last"><a href="login">Iniciar Sesión</a> </li>
      <?php } else { ?>
        <li class="last"><a href="mi_cuenta">Mi cuenta</a> </li>
        <li class="last"><a href="logout">Logout</a> </li>
      <?php } ?>
    </ul>
  </div>
</div>