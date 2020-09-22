<?php
session_start();
if (!isset($_SESSION['panel'])) {
    header('location: index');
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
    <title>Listado de Productos | Miapp</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.bootstrap4.min.css">
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
                    <div class="col-sm-12">
                        <div class="card-box">
                            <div class="card-block">
                                <h6 class="page-title">Listado de Productos</h6>
                                <div class="table-responsive">
                                    <table id="tbl_producto" class="datatable table table-stripped ">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Foto</th>
                                                <th class="text-center">Código</th>
                                                <th class="text-center">Precio</th>
                                                <th class="text-center">Estado</th>
                                                <th class="text-center">Top</th>
                                                <th class="text-center">Fecha</th>
                                                <th class="text-center"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="notification-box">
                <?php include_once 'layout/notificacion.php'; ?>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Cambiar categoria: <code id="data_codigo"></code></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="form_cambiarCat">
                    <div class="row">
                    <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Familia</label>
                                <div class="col-md-9">
                                    <select class="select" name="carga_familia1" id="carga_familia1">
                                        <option disabled selected>Seleccione</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Categoria</label>
                                <div class="col-md-9">
                                    <select class="select" name="carga_categoria1" id="carga_categoria1">
                                        <option disabled selected>Seleccione</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Sección</label>
                                <div class="col-md-9">
                                    <select class="select" name="carga_seccion1" id="carga_seccion1">
                                        <option disabled selected>Seleccione</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="btn_3" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/funciones.js"></script>
</body>

</html>