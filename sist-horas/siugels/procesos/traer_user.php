<?php
require_once '../../class/Usuario.php';
$cl_usuario = new Usuario();

$id = filter_input(INPUT_POST, 'indice_user');

$cl_usuario->setId($id);

$result = $cl_usuario->View_profile();

$json = array();
  $json[] = array(
    'usuario' => $cl_usuario->getUsername()
  );

$jsonstring = json_encode($json[0]); //codificar el primer elemento del array
echo $jsonstring;
?>