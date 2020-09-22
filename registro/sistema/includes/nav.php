<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded" src="../img/profile.png" />
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="block m-t-xs font-bold"><?php echo $_SESSION['usuario'];?> <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <!-- <li><a class="dropdown-item" href="profile.html">Profile</a></li> -->
                        <!-- <li><a class="dropdown-item" href="contacts.html">Contacts</a></li> -->
                        <!-- <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li> -->
                        <!-- <li class="dropdown-divider"></li> -->
                        <li><a class="dropdown-item" href="logout.php">Salir</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    <img src="img/bloc.png" alt="" style="height: 30px;">
                </div>
            </li>
            <li>
                <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Panel de Control</span></a>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-user"></i> <span class="nav-label">Practicantes</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="view_practicantes.php">Listado</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript:void(0)"><i class="fa fa-calendar"></i> <span class="nav-label">Inicio prácticas</span>
                    <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="reg_inicio.php">Registrar</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>