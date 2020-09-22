<?php
 session_start();
 if (empty($_SESSION['active'])) {  //si $_SESSION['active'] esta vacio pues no aun no hay sesion
    // echo $_SESSION['active'];
    header('location: ../index.php');
} 

if (isset($_GET["error"])) {
    $texto = '<div class="alert alert-danger no-border mb-2" role="alert">
                <strong>Error: </strong> Seleccione una opción para generar el reporte
              </div>';
}
  ?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <title>SIUGELS</title>
    <?php include 'includes/script-head.php'; ?>
</head>

<body data-open="click" data-menu="vertical-menu" data-col="2-columns"
    class="vertical-layout vertical-menu 2-columns  fixed-navbar">
    <!-- navbar-fixed-top-->
    <?php include 'includes/navbar.php'; ?>
    <!-- fin navbar-->

    <!-- main menu-->
    <?php include 'includes/main-menu.php'; ?>
    <!-- / main menu-->

    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- stats -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Listado de Docentes</h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block card-dashboard">
                                <?php echo isset($texto) ? $texto : ''; ?>
                                    <form action="reporte_docentes.php" method="post" id="ReporteDocentes">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="inputState">Seleccione Institución</label>
                                                <select id="selectVerInst" name="SeleccInst" class="form-control">
                                                    <option value="none" selected="" disabled="">-- Seleccione --
                                                    </option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                            <input type="hidden" name="verificar" value="1">
                                            <button type="submit" class="btn btn-info"><i class="icon-download22"></i> Descargar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- <br><br> -->
                                    <div class="table-responsive">
                                        <table id="TablaDoc" class="display table table-striped table-hover"
                                            cellspacing="0" width="100%">
                                            <thead>
                                                <tr id="cabecera">
                                                    <th style="width:40px;">#</th>
                                                    <th style="width:140px;">Nombres</th>
                                                    <th style="width:140px;">Apellido Paterno</th>
                                                    <th style="width:140px;">Apellido Materno</th>
                                                    <!-- <th style="width:140px;"></th> -->
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_doc">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ stats -->
            </div>
        </div>
    </div>
    <!-- fin contenido-->
    <!-- footer -->
    <?php //include 'includes/footer.php'; ?>
    <!-- fin footer -->
    <?php include 'includes/script-body.php'; ?>
</body>

</html>