<?php
session_start();
if (!isset($_SESSION['panel'])) {
    header('location: index');
}
require_once '../class/conexion.php';
require_once '../class/Cliente.php';

$cl_cliente = new Cliente();

if (isset($_GET['id'])) {

    $cl_cliente->setId($_GET['id']);
    $row_detalle_pedidos = $cl_cliente->Profile_empresa();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <!-- Favicons Icon -->
    <link rel="icon" href="assets/img/icono/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="assets/img/icono/favicon.ico" type="image/x-icon" />

    <link rel="apple-touch-icon" sizes="57x57" href="assets/img/icono/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/img/icono/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/img/icono/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/icono/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/img/icono/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/img/icono/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/img/icono/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/img/icono/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icono/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="assets/img/icono/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/icono/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/icono/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/icono/favicon-16x16.png">
    <link rel="manifest" href="assets/img/icono/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title>Detalle Empresa | Miapp</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body>
    <div class="main-wrapper">
        <div class="header">
            <?php include_once 'layout/header.php'; ?>
        </div>
        <div class="sidebar" id="sidebar">
            <?php include_once 'layout/sidebar.php'; ?>
        </div>
        <div class="page-wrapper">
            <div class="content">
                <div class="row">
                </div>
                <form>
                    <div class="card-box">
                    <h6 class="page-title">Datos de la empresa</h6>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Titula de la empresa</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_cliente->getNombre_titular().' '.$cl_cliente->getApellido_titular();  ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Razon Social</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_cliente->getRazon_social(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Nombre Comercial</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_cliente->getNombre_comercial(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Ruc</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_cliente->getRuc(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Correo</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_cliente->getCorreo(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Dirección</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_cliente->getDireccion(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Ubicación</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_cliente->getUbicacion(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Celular</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_cliente->getCelular(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Correo</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_cliente->getCorreo(); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-box">
                    <h6 class="page-title">Datos del contacto</h6>
                        <div class="row">
                        <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Nombres</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_cliente->getNombres()  ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Apellido Paterno</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_cliente->getApe_paterno(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Apellido Materno</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_cliente->getApe_materno(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Dni</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_cliente->getDni(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Celular</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_cliente->getContacto_celular(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Correo</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_cliente->getContacto_correo(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Cargo</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_cliente->getContacto_cargo(); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="notification-box">
                <?php include_once 'layout/notificacion.php'; ?>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>