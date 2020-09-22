<?php
session_start();

require_once '../../class/Usuario.php';
$cl_usuario = new Usuario();

$id_director = $_SESSION['IdDirector'];
$clave = filter_input(INPUT_POST, 'pass_nuevo');

$pass_cifrado = sha1($clave);

if (strlen($clave) < 6) {
  echo 'error1';
} else if (strlen($clave) > 16) {
  echo 'error2';
} else if (!preg_match('`[A-Z]`', $clave)) {
  echo 'error3';
} else {
  // echo 'correcto';

  $cl_usuario->setId($id_director);
  $cl_usuario->setPassword($pass_cifrado);
  $result = $cl_usuario->Cambiar_password();

  if ($result) {
    echo 'exito';
  } else {
    echo 'error';
  }

}
?>