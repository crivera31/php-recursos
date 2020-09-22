<?php
session_start();

require_once '../class/conexion.php';
require_once '../class/Cliente.php';
$cl_cliente = new Cliente();

$nombres = filter_input(INPUT_POST, 'nombres');
$a_paterno = filter_input(INPUT_POST, 'a_paterno');
$a_materno = filter_input(INPUT_POST, 'a_materno');
$dni = filter_input(INPUT_POST, 'dni');
$correo = filter_input(INPUT_POST, 'email');
$contra = filter_input(INPUT_POST, 'pass');
$celular = filter_input(INPUT_POST, 'celular');

$cl_cliente->setNombres($nombres);
$cl_cliente->setApe_paterno($a_paterno);
$cl_cliente->setApe_materno($a_materno);
$cl_cliente->setDni($dni);
$cl_cliente->setCorreo($correo);
$cl_cliente->setContra($contra);
$cl_cliente->setCelular($celular);

$result = $cl_cliente->Reg_cliente();

if ($result) {
  // $_SESSION['active'] = true;
  // $_SESSION['id_cliente'] = $cl_cliente->getId();
  // $_SESSION['n_cliente'] = $cl_cliente->getNombres();
  echo 'success';
}
?>