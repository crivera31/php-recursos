<?php
 session_start();
//  print_r ($_SESSION);

function Listado_meses(){
	$array = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
    $llenar = '';
	for ($i=0; $i<sizeof($array); $i++){
    $llenar .= "<option value=".($i+1).">". $array[$i] . "</option>";
	}
	return $llenar;
}

if (isset($_GET["error1"]) == 'escoga_opcion') {
    $texto = '<div class="alert alert-danger no-border mb-2" role="alert">
                <strong>Ecoga opciones para generar el reporte.</strong>
              </div>';
}else if (isset($_GET["error2"]) == 'registro_no_econtrado') {
    $texto = '<div class="alert alert-danger no-border mb-2" role="alert">
                <strong>No hay registro para el mes seleccionado.</strong>
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
    <link rel="shortcut icon" href="icono.png"/>
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
                                <h4 class="card-title">Reportes de Horas efectivas por Institucion</h4>
                                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                            </div>
                            <div class="card-body collapse in">
                                <div class="card-block card-dashboard">
                                <?php echo isset($texto) ? $texto : ''; ?>
                                    <form action="reporte_horas.php" method="post" id="FormReporte">
                                        <div class="row">
                                            <div class="form-group col-md-4">
                                                <label for="inputState">Seleccione Institución</label>
                                                <select id="selectVerInst" name="selectVerInst" class="form-control">
                                                    <option value="none" selected="" disabled="">-- Seleccione --
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="inputState">Mes</label>
                                                <select id="selectVerMes" name="selectVerMes" class="form-control">
                                                    <option value="none" selected="" disabled="">-- Seleccione --
                                                    </option>
                                                    <?php 
                                                    $resultado = Listado_meses();
                                                    echo $resultado;
                                                ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-md-3">
                                                <input type="hidden" name="validar" value="1">
                                                <button type="submit" class="btn btn-info" value><i class="icon-download22"></i> Descargar</button>
                                            </div>
                                        </div>
                                    </form>
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

