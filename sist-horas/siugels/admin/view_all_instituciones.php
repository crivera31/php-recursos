<?php
 require_once '../class/Colegio.php';
 $cl_colegio = new Colegio();

$result = $cl_colegio->View_all_instituciones();

$json = array();
foreach ($result as $row) { 
  $json[] = array(
    'id' => $row['IdInstitucion'],
    'nombre' => $row['nombre'],
    'direccion' => $row['direccion'],
    'niveles' => $row['niveles'],
  );
}
  $jsonstring = json_encode($json); ////codificar el primer elemento del array
  echo $jsonstring;
?>