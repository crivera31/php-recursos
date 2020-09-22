<?php
require_once '../../class/Usuario.php';
$cl_usuario = new Usuario();

$result = $cl_usuario->View_all_users();

$json = array();
foreach ($result as $row) { 
  $json[] = array(
    'id' => $row['IdDirector'],
    'nombre' => $row['nombre'],
    'apaterno' => $row['ape_paterno'],
    'amaterno' => $row['ape_materno'],
    'usuario' => $row['username']
    // 'colegio' => $row['n_colegio']
  );
}
  $jsonstring = json_encode($json); ////codificar el primer elemento del array
  echo $jsonstring;
?>