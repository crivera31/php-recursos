<?php
require_once '../../class/Usuario.php';
$cl_usuario = new Usuario();

$usuario = filter_input(INPUT_POST, 'usuario');
$password = filter_input(INPUT_POST, 'clave');
$rol = 2;
if (strlen($password) < 6) {
  echo 'error1';
} else if (strlen($password) > 16) {
  echo 'error2';
} else if (!preg_match('`[A-Z]`', $password)) {
  echo 'error3';
} else {
  $pass_cifrado = sha1($password);
  $cl_usuario->setUsername($usuario);
  $cl_usuario->setPassword($pass_cifrado);

  $validar = $cl_usuario->Validar_user();
  if ($validar) {
    echo 'user_existente';
  } else {

    $result = $cl_usuario->Add_user($rol);

    if ($result) {
      echo 'success';
    } else {
      echo 'error';
    }
  }
  
}

?>