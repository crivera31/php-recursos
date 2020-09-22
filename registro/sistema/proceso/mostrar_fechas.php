<?php
require_once '../class/Fechas.php';
$cl_fecha = new Fecha();

$result = $cl_fecha->Mostrar_fechas();

$json = array();
  foreach ($result as $row) {
    $json[] = array(
      'nombre' => $row['nombre'],
      'ap_paterno' => $row['apaterno'],
      'ap_materno' => $row['amaterno'],
      'f_ini' => date("d/m/Y", strtotime($row['fecha_ini'])),
      'f_fin' => date("d/m/Y", strtotime($row['fecha_fin'])),
      'status' => $row['estado']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>