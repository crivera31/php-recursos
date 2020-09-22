<?php
  require_once '../class/Usuario.php';  
  $cl_usuario = new Usuario();

  $usuario = filter_input(INPUT_POST, 'mi_user');
  $pass1 = filter_input(INPUT_POST, 'nueva_pass');
  $pass2 = filter_input(INPUT_POST, 'confirma_pass');

  if (strcmp($pass1, $pass2) !== 0) {
    echo 'no_coinciden';
  } else if (strlen($pass1) < 6) {
    echo 'error1';
  } else if (strlen($pass1) > 16) {
    echo 'error2';
  } else if (!preg_match('`[A-Z]`', $pass1)) {
    echo 'error3';
  } else {

    $pass_cifrado = sha1($pass1);
    $cl_usuario->setUsername($usuario);
    $cl_usuario->setPassword($pass_cifrado);

    $verificar = $cl_usuario->Verificar_usuario();

    if ($verificar) {
      // echo 'exite';
      $result = $cl_usuario->Resetear_password();

      if ($result) {
        echo 'success';
      } else {
        echo 'error';
      }
    } else {
      echo 'no_existe';
    }
  }
?>