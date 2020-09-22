<?php
require_once '../class/Departamentos.php';
$cl_departamento = new Departamento();

$result = $cl_departamento->View_departamentos();

$json = array();
  foreach ($result as $row) {
    $json[] = array(
      'id' => $row['IdDepartamento'],
      'departamento' => $row['nombre']
    );
  }
  $jsonstring = json_encode($json); ////codificar el primer elemento del array
  echo $jsonstring;
?>