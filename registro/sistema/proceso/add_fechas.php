<?php
require_once '../class/Fechas.php';
$cl_fecha = new Fecha();

//formato
$inicio = filter_input(INPUT_POST, 'fecha_ini');
$date = str_replace('/', '-', $inicio); 
$fecha_inicio = date("Y-m-d", strtotime($date));

//formato
$fin = filter_input(INPUT_POST, 'fecha_fin');
$date = str_replace('/', '-', $fin);
$fecha_fin = date("Y-m-d", strtotime($date));

$id_practicante = filter_input(INPUT_POST, 'id');

$cl_fecha->setFecha_ini($fecha_inicio);
$cl_fecha->setFecha_fin($fecha_fin);
$cl_fecha->setPracticante_id($id_practicante);

$validar = $cl_fecha->Validar_fecha();
if ($validar) {
  echo 'existe';
} else {
  $result = $cl_fecha->Add_fechas();
  if ($result) {
    echo 'agregado';
  } else {
    echo 'error';
  }
}

?>