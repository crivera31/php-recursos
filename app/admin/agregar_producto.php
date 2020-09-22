<?php
session_start();
if(!isset($_SESSION['panel'])){
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
    <title>Agregar Producto | Miapp</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <style>
        #notItem1 option:first-child {
            display: none;
        }

        #notItem2 option:first-child {
            display: none;
        }

        #load_img {
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 2px;
            background: #fff;
            max-width: 250px;
        }

        #load_img img {
            max-width: 100%;
            height: auto;
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
                    <div class="col-sm-12">
                        <h4 class="page-title"><i class="fa fa-edit"></i> Agregar Producto</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="profile-widget" id="load_img">
                            <img src="../images/productos/default1.webp">
                        </div>
                        <div class="user-country" id="msj_formato" style="text-align:center;">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card-box">
                            <h4 class="card-title">Detalle del Producto</h4>
                            <form id="form-addProducto" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Código</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" id="reg_codigo" name="reg_codigo" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Familia</label>
                                            <div class="col-md-9">
                                                <select class="select" name="reg_familia" id="reg_familia" required>
                                                    <option disabled selected>Seleccione</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Categoria</label>
                                            <div class="col-md-9">
                                                <select class="select" name="reg_categoria" id="reg_categoria" required>
                                                    <option disabled selected>Seleccione</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Sección</label>
                                            <div class="col-md-9">
                                                <select class="select" name="reg_seccion" id="reg_seccion">
                                                    <option disabled selected>Seleccione</option>
                                                    <option value="0">Ninguno</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Precio C.</label>
                                            <div class="col-md-9">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">$/.</span>
                                                    </div>
                                                    <input type="text" class="form-control" aria-label id="reg_precioC" name="reg_precioC" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Precio V.</label>
                                            <div class="col-md-9">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">S/.</span>
                                                    </div>
                                                    <input type="text" class="form-control" aria-label id="reg_precioV" name="reg_precioV" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Descuento</label>
                                            <div class="col-md-9">
                                            <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1">S/.</span>
                                                    </div>
                                                    <input type="text" id="reg_descuento" name="reg_descuento" value="0.00" class="form-control" aria-label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Estado</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="reg_estado" name="reg_estado">
                                                    <option value="0">Inactivo</option>
                                                    <option value="1">Activo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Ficha técnica</label>
                                            <div class="col-md-9">
                                                <textarea id="reg_ficha" name="reg_ficha" class="form-control"  style="width: 650px;" rows="2" class="form-control" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Descrip.</label>
                                            <div class="col-md-9">
                                                <textarea id="reg_descripcion" name="reg_descripcion" class="form-control"  style="width: 650px;" rows="2" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Top</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="reg_top" name="reg_top" required>
                                                    <option value="0">No</option>
                                                    <option value="1">Si</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Tipo</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="reg_nuevo" name="reg_nuevo" required>
                                                    <option value="0">No nuevo</option>
                                                    <option value="1">Nuevo</option>
                                                    <option value="2">Oferta</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Foto</label>
                                            <div class="col-md-9">
                                                <input class="form-control"  type="file" name="foto" id="foto" style="width: 370px;" onclick="ver_img()" required>
                                                <div class="user-country" id="">
                                                    Foto en formato <code>.png</code> y <code>900x900</code>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center m-t-20">
                                    <button class="btn btn-primary submit-btn" type="submit">Guardar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/select2.min.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    <script src="assets/js/subir-file.js"></script>
</body>

</html>

