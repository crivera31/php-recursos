<?php
session_start();
require_once '../class/Grado.php';
$cl_grado = new Grado();

$id_institucion = filter_input(INPUT_POST, 'id_institucion');

$cl_grado->setId_institucion($id_institucion);
$result = $cl_grado->View_grado_por_institucion();


$json = array();
foreach ($result as $row) {
  $json[] = array(
    'id' => $row['id'],
    'nivel' => $row['nivel'],
    'nombre' => $row['grado'],
    'nom_seccion' => $row['seccion']
  );
}
$jsonstring = json_encode($json); ////codificar el primer elemento del array
echo $jsonstring;

?>