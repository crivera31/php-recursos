<?php
require_once '../class/Practicante.php';
$cl_practicante = new Practicante();

$result = $cl_practicante->Listado_Practicantes();

$json = array();
  foreach ($result as $row) {
    $json[] = array(
      'id' => $row['id'],
      'nombre' => $row['nombre'],
      'ape_paterno' => $row['apaterno'],
      'ape_materno' => $row['amaterno']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>