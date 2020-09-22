<?php
require_once '../class/Distritos.php';
$cl_distrito = new Distrito();

$id_provincia = $_POST['dato2'];

$cl_distrito->setId_provin($id_provincia);

$result = $cl_distrito->View_distritos();

$json = array();
  foreach ($result as $row) {
    $json[] = array(
      'id' => $row['IdDistrito'],
      'distrito' => $row['nombre']
    );
  }
  $jsonstring = json_encode($json); ////codificar el primer elemento del array
  echo $jsonstring;
?>