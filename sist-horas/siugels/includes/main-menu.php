<div data-scroll-to-active="true" class="main-menu menu-fixed menu-light menu-accordion menu-shadow">
  <div class="main-menu-header">
    <h3>Panel de Control</h3>
  </div>
  <div class="main-menu-content">
    <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
      <?php 
        if ($_SESSION['rolID'] == 2) {  ?>
      <li class=" nav-item"><a href="#"><i class="icon-office"></i><span data-i18n="nav.page_layouts.main"
            class="menu-title">Datos Institución</span></a>
        <ul class="menu-content">
          <li><a href="../siugels/add_institucion.php" data-i18n="nav.page_layouts.1_column" class="menu-item">Añadir
              Institución</a>
          </li>
        </ul>
      </li>
      <li class=" nav-item"><a href="#"><i class="icon-user-tie"></i><span data-i18n="nav.project.main"
            class="menu-title">Docentes</span></a>
        <ul class="menu-content">
          <li><a href="../siugels/add_docente.php" data-i18n="nav.invoice.invoice_template" class="menu-item">Añadir
              docentes</a>
          </li>
        </ul>
      </li>
      <li class=" nav-item"><a href="#"><i class="icon-compose"></i><span data-i18n="nav.cards.main"
            class="menu-title">Registrar horas</span></a>
        <ul class="menu-content">
          <li><a href="../siugels/reg_horas.php" data-i18n="nav.cards.card_bootstrap" class="menu-item">Registrar</a>
          </li>
        </ul>
      </li>
      <?php } else { ?>
      <li class=" nav-item"><a href="#"><i class="icon-ios-people"></i><span data-i18n="nav.cards.main"
            class="menu-title">Usuarios</span></a>
        <ul class="menu-content">
          <li><a href="../siugels/add_user.php" data-i18n="nav.cards.card_bootstrap" class="menu-item">Registrar</a>
          </li>
        </ul>
      </li>
      <li class=" nav-item"><a href="#"><i class="icon-office"></i><span data-i18n="nav.cards.main"
            class="menu-title">Instituciones</span></a>
        <ul class="menu-content">
          <li><a href="../siugels/view_instituciones.php" data-i18n="nav.cards.card_bootstrap" class="menu-item">Listar</a>
          </li>
        </ul>
      </li>
      <li class=" nav-item"><a href="#"><i class="icon-user-tie"></i><span data-i18n="nav.cards.main"
            class="menu-title">Docentes</span></a>
        <ul class="menu-content">
          <li><a href="../siugels/view_docentes.php" data-i18n="nav.cards.card_bootstrap" class="menu-item">Listar</a>
          </li>
        </ul>
      </li>
      <li class=" nav-item"><a href="#"><i class="icon-android-clipboard"></i><span data-i18n="nav.cards.main"
            class="menu-title">Horas efectivas</span></a>
        <ul class="menu-content">
          <li><a href="../siugels/informe_horas.php" data-i18n="nav.cards.card_bootstrap" class="menu-item">Ver informe</a>
          </li>
        </ul>
      </li>
      <?php } ?>
    </ul>
  </div>
</div>