<?php
require_once '../class/Provincias.php';
$cl_provincia = new Provincia();

$id_departamento = $_POST['dato1'];

$cl_provincia->setId_depar($id_departamento);

$result = $cl_provincia->View_provincias();

$json = array();
  foreach ($result as $row) {
    $json[] = array(
      'id' => $row['IdProvincia'],
      'provincia' => $row['nombre']
    );
  }
  $jsonstring = json_encode($json); ////codificar el primer elemento del array
  echo $jsonstring;
?>