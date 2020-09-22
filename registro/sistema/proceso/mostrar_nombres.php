<?php
require_once '../class/Practicante.php';
$cl_practicante = new Practicante();

$result = $cl_practicante->Nombres();

$json = array();
  foreach ($result as $row) {
    $json[] = array(
      'id' => $row['id'],
      'nombre' => $row['nombre']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
?>