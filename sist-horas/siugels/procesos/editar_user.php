<?php
require_once '../../class/Usuario.php';
$cl_usuario = new Usuario();

$user = filter_input(INPUT_POST, 'user');
$id = filter_input(INPUT_POST, 'id');

if (trim($user) == '') {
  echo 'llenar_campos';
} else {
  $cl_usuario->setId($id);
  $cl_usuario->setUsername($user);

  $result = $cl_usuario->Update_user();
  if ($result) {
    echo 'actualizado';
  } else {
    echo 'error';
  }
}

?>