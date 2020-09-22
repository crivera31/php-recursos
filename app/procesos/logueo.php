<?php
session_start();

require_once '../class/conexion.php';
require_once '../class/Cliente.php';
$cl_cliente = new Cliente();

$correo = filter_input(INPUT_POST, 'correo');
$contra = filter_input(INPUT_POST, 'password');

$cl_cliente->setCorreo($correo);
$cl_cliente->setContra($contra);

$result = $cl_cliente->Login();

if ($result) {
  $_SESSION['active'] = 'si';
  $_SESSION['id_cliente'] = $cl_cliente->getId();
  $_SESSION['tipo'] = $cl_cliente->getTipo();
  echo 'success';
} else {
  echo 'error';
}

?>