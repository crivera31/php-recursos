<?php
require_once '../class/Practicante.php';
$cl_practicante = new Practicante();

$id = filter_input(INPUT_POST, 'id_nombre');
$cl_practicante->setId($id);

$result = $cl_practicante->Apellidos();

$json = array();
  foreach ($result as $row) {
    $json[] = array(
      'ap_paterno' => $row['apaterno'],
      'ap_materno' => $row['amaterno']
    );
  }
  $jsonstring = json_encode($json[0]);
  echo $jsonstring;
?>