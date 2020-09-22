<?php
session_start();
if (!isset($_SESSION['panel'])) {
    header('location: index');
}
require_once '../class/conexion.php';
require_once '../class/Pedido.php';
require_once '../class/Detalle_pedido.php';

$cl_pedido = new Pedido();
$cl_detalle_pedido = new Detalle_pedido();

if (isset($_GET['id'])) {

    $cl_detalle_pedido->setPedido_id($_GET['id']);
    $row_detalle_pedidos = $cl_detalle_pedido->ver_detalle_pedido();

    $cl_pedido->setId($_GET['id']);
    $cl_pedido->ver_detalle_pedido_destino();
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
    <link rel="icon" type="image/png" sizes="192x192" href="assets/img/icono/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/icono/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/icono/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/icono/favicon-16x16.png">
    <link rel="manifest" href="assets/img/icono/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title>Detalle Pedido | Miapp</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
        #estado option:first-child {
            display: none;
        }
    </style>
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
                    <input type="hidden" id="id_p" name="id_p" value="<?php echo $cl_pedido->getId(); ?>">
                    <div class="col-12 col-md-8">
                        <h4 class="page-title">Detalle Pedido: <em>#<?php echo $cl_pedido->getNum_pedido(); ?></em></h4>
                    </div>
                    <div class="col-6 col-md-4">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Estado</label>
                            <div class="col-md-6">
                                <select class="form-control" id="estado" name="estado">
                                    <?php echo '<option value="Pendiente" selected>'.$cl_pedido->getEstado().'</option>'; ?>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="Pagado">Pagado</option>
                                    <option value="Enviado">Enviado</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <form>
                    <div class="card-box">
                        <h3 class="card-title">Datos del destinatario</h3>
                        <div class="row">
                            <?php if ($cl_pedido->getTipo() != 2) { ?>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Apellidos y Nombres</label>
                                        <input type="text" class="form-control floating" value="<?php echo $cl_pedido->getApellidos() . ' ' . $cl_pedido->getNombres(); ?>">
                                    </div>
                                </div>
                            <?php } else { ?>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Razon Social</label>
                                        <input type="text" class="form-control floating" value="<?php echo $cl_pedido->getRazon(); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Nombre Comercial</label>
                                        <input type="text" class="form-control floating" value="<?php echo $cl_pedido->getComercial(); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Ruc</label>
                                        <input type="text" class="form-control floating" value="<?php echo $cl_pedido->getRuc(); ?>">
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Correo</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_pedido->getCorreo(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Celular</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_pedido->getCelular(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Fecha y Hora</label>
                                    <input type="text" class="form-control floating" value="<?php echo date("d/m/Y", strtotime($cl_pedido->getFecha())) . ' ' . date("h:i:s a ", strtotime($cl_pedido->getHora())); ?>">
                                </div>
                            </div>
                            <?php if ($cl_pedido->getTipo() != 2) { ?>
                                <div class="col-md-6">
                                    <div class="form-group form-focus">
                                        <label class="focus-label">DNI</label>
                                        <input type="text" class="form-control floating" value="<?php echo $cl_pedido->getDni(); ?>">
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Dirección</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_pedido->getDireccion(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Referencia</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_pedido->getReferencia(); ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-focus">
                                    <label class="focus-label">Departamento/Provincia/Distrito</label>
                                    <input type="text" class="form-control floating" value="<?php echo $cl_pedido->getUbicacion(); ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Items</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped custom-table">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Foto</th>
                                            <th class="text-center">Nombre</th>
                                            <th class="text-center">Cantidad</th>
                                            <th class="text-center">Precio</th>
                                            <th class="text-center">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $total = 0;
                                        foreach ($row_detalle_pedidos as $fila) { ?>
                                            <tr class="first odd">
                                                <td class="text-center" style="vertical-align:middle;">
                                                    <img class="img-fluid img-thumbnail" width="75" src="../images/productos/<?php echo $fila['foto']; ?>">
                                                </td>
                                                <td class="text-center" style="vertical-align:middle;"><?php echo $fila['codigo']; ?></td>
                                                <td class="text-center" style="vertical-align:middle;"><?php echo $fila['cantidad']; ?></td>
                                                <td class="text-center" style="vertical-align:middle;">S/ <?php echo number_format($fila['precio'], 2); ?></td>
                                                <td class="text-center" style="vertical-align:middle;"><span class="price">S/ <?php echo number_format($fila['cantidad'] * $fila['precio'], 2) ?></span></td>
                                            </tr>
                                        <?php $total = $total + ($fila['precio'] * $fila['cantidad']);
                                        }
                                        ?>
                                    </tbody>
                                    <tr>
                                        <td class="text-center" colspan="4">
                                            <h4>SubTotal</h4>
                                        </td>
                                        <th class="text-center" style="vertical-align:middle;">
                                            <h4>S/ <?php echo number_format($total, 2); ?></h4>
                                        </th>
                                    </tr>
                                </table>
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
    <script src="assets/js/estado.js"></script>
</body>

</html>