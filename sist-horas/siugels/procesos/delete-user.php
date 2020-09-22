<?php
  require_once '../../class/Usuario.php';
  $cl_usuario = new Usuario();

  $id = filter_input(INPUT_POST, 'id');

  $cl_usuario->setId($id);
  $result = $cl_usuario->Delete_user();
  if ($result) {
    echo 'exito';
  } else {
    echo 'error';
  }

?>