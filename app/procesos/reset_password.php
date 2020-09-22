<?php
require_once '../class/conexion.php';
require_once '../class/Cliente.php';
$cl_cliente = new Cliente();

  $usuario = filter_input(INPUT_POST, 'correo');
  $pass1 = filter_input(INPUT_POST, 'nueva_pass');
  $pass2 = filter_input(INPUT_POST, 'confirma_pass');

  if (strcmp($pass1, $pass2) !== 0) {
    echo 'no_coinciden';
  } else {
    $cl_cliente->setCorreo($usuario);
    $cl_cliente->setContra($pass1);

    $verificar = $cl_cliente->Verificar_usuario();

    if ($verificar) {
      $result = $cl_cliente->Resetear_password();
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