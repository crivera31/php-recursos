<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-light navbar-shadow">
  <div class="navbar-wrapper">
    <div class="navbar-header">
      <ul class="nav navbar-nav">
        <li class="nav-item mobile-menu hidden-md-up float-xs-left"><a
            class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="icon-menu5 font-large-1"></i></a></li>
        <li class="nav-item"><a href="../siugels" class="navbar-brand nav-link"><img alt="branding logo"
              src="app-assets/images/logo/logo_ugel1.png"
              data-expand="app-assets/images/logo/logo_ugel1.png"
              data-collapse="app-assets/images/logo/inscripcion1.png" class="brand-logo"></a></li>
        <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile"
            class="nav-link open-navbar-container"><i class="icon-ellipsis pe-2x icon-icon-rotate-right-right"></i></a>
        </li>
      </ul>
    </div>
    <div class="navbar-container content container-fluid">
      <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
        <ul class="nav navbar-nav">
          <li class="nav-item hidden-sm-down"><a class="nav-link nav-menu-main menu-toggle hidden-xs"><i
                class="icon-menu5"> </i></a></li>
        </ul>
        <ul class="nav navbar-nav float-xs-right">
          <li class="dropdown dropdown-user nav-item"><a href="#" data-toggle="dropdown"
              class="dropdown-toggle nav-link dropdown-user-link"><span class="avatar avatar-online"><img
                  src="app-assets/images/portrait/small/<?php echo ($_SESSION['rolID'] == 1) ? 'admin.png' : 'user.png' ;?>" alt="avatar"><i></i></span><span
                class="user-name"><?php echo $_SESSION['nickuser']; ?></span></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="profile.php" class="dropdown-item"><i class="icon-head"></i> Ver Perfil</a>
              <a href="javascript:void(0)" data-toggle="modal" data-target="#ModalCambPass" data-backdrop="static" data-keyboard="false" class="dropdown-item"><i class="icon-locked"></i> Cambiar Contraseña</a>
              <!-- <a href="#" class="dropdown-item"><i class="icon-clipboard2"></i> Task</a> -->
              <!-- <a href="#" class="dropdown-item"><i class="icon-calendar5"></i>
                Calender</a> -->
              <div class="dropdown-divider"></div><a href="logout.php" class="dropdown-item"><i class="icon-power3"></i>
                Salir</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>
<?php include 'modals/cambiar_password.php'; ?>