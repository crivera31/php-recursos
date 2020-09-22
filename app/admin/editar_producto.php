<?php
session_start();
if(!isset($_SESSION['panel'])){
    header('location: index');
}

require_once '../class/conexion.php';
require_once '../class/Producto.php';
$cl_producto = new Producto();

$codigo = $_GET['id'];
$cl_producto->setCodigo($codigo);
$cl_producto->Mostrar_detalles_producto();

$id = $cl_producto->getCategoria_id(); /**categoria_id */
$padre_id = $cl_producto->getPadre_id(); /**padre_id */

if ($id == 0) {
    $resp = $cl_producto->obtener_niveles1($padre_id);
} else {
    $resp = $cl_producto->obtener_niveles($id);
}

if($cl_producto->getEstado() == 1){
    $estado = '<option value="1" selected>Activo</option>';
} else {
    $estado = '<option value="0" selected>Inactivo</option>';
}

if ($cl_producto->getNuevo() == 0) {
    $tipo = '<option value="0" selected>No nuevo</option>';
} else if ($cl_producto->getNuevo() == 1) {
    $tipo = '<option value="1" selected>Nuevo</option>';
}else if ($cl_producto->getNuevo() == 2) {
    $tipo = '<option value="2" selected>Oferta</option>';
}

if ($cl_producto->getTop() == 1) {
    $top = '<option value="1" selected>Si</option>';
} else {
    $top = '<option value="0" selected>No</option>';
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
    <title>Editar Producto | Miapp</title>
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

        #notItem3 option:first-child {
            display: none;
        }

        #load_img {
            border: 1px solid #ddd;
            padding: 5px;
            border-radius: 2px;
            background: #fff;
            max-width: 300px;
        }

        #load_img img {
            max-width: 100%;
            height: auto;
        }

        p#texto {
            text-align: center;
            color: white;
            padding: 5px;
        }

        div#div_file {
            position: relative;
            margin: 50px;
            /* padding: 10px; */
            width: 150px;
            background-color: #009efb;
            border-radius: 5px;
            box-shadow: 0px 3px 0px #1a71a9;
        }

        input#foto {
            position: absolute;
            top: 0px;
            left: 0px;
            right: 0px;
            bottom: 0px;
            width: 100%;
            height: 100%;
            opacity: 0;
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
                        <h4 class="page-title"><i class="fa fa-edit"></i> Editar Producto</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="profile-widget" id="load_img">
                            <img id="img_load" class="img-responsive" src="../images/productos/<?php echo $cl_producto->getFoto(); ?>" style="max-width: 100%; height: auto;">
                        </div>
                        <div id="div_file">
                            <p id="texto">Cambiar foto</p>
                            <input type="file" id="foto" name="foto" onchange="upload_image()">
                        </div>
                        <div id="msj_upload_img" style="text-align:center;">
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="card-box">
                            <h4 class="card-title">Detalle del Producto</h4>
                            <form id="form-updateProducto" enctype="multipart/form-data">
                            <input type="hidden" name="edit_id" id="edit_id" value="<?php echo $cl_producto->getId(); ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Código</label>
                                            <div class="col-md-9">
                                                <input type="text" id="edit_codigo" name="edit_codigo" class="form-control" value="<?php echo $cl_producto->getCodigo(); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Familia</label>
                                            <div class="col-md-9" id="diego">
                                                <input type="text" class="form-control" value="<?php echo $resp[0]; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Categoria</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" value="<?php echo $resp[1]; ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Sección</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" value="<?php echo count($resp) == 2 ? 'Ninguno' :  $resp[2] ; ?>" disabled>
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
                                                    <input type="text" id="edit_precioC" name="edit_precioC" class="form-control" value="<?php echo $cl_producto->getPrecio_compra(); ?>" aria-label>
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
                                                    <input type="text" id="edit_precioV" name="edit_precioV" class="form-control" value="<?php echo $cl_producto->getPrecio_venta(); ?>" aria-label>
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
                                                    <input type="text" id="edit_descuento" name="edit_descuento" class="form-control" value="<?php echo $cl_producto->getDescuento(); ?>" aria-label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Estado</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="notItem3" name="notItem3">
                                                    <?php echo $estado; ?>
                                                    <option value="1">Activo</option>
                                                    <option value="0">Inactivo</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Ficha técnica</label>
                                            <div class="col-md-9">
                                                <textarea id="edit_ficha" name="edit_ficha" style="width: 650px;" rows="2" class="form-control"><?php echo $cl_producto->getFicha_tecnica(); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Descrip.</label>
                                            <div class="col-md-9">
                                                <textarea id="edit_descripcion" name="edit_descripcion" style="width: 650px;" rows="2" class="form-control"><?php echo $cl_producto->getDescripcion(); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Tags</label>
                                            <div class="col-md-9">
                                                <textarea id="edit_tags" name="edit_tags" style="width: 650px;" rows="1" class="form-control"><?php echo $cl_producto->getTags(); ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Top</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="notItem1" name="notItem1">
                                                    <?php echo $top; ?>
                                                    <option value="1">Si</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label">Tipo</label>
                                            <div class="col-md-9">
                                                <select class="form-control" id="notItem2" name="notItem2">
                                                    <?php echo $tipo; ?>
                                                    <option value="1">Nuevo</option>
                                                    <option value="0">No nuevo</option>
                                                    <option value="3">Oferta</option>
                                                </select>
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