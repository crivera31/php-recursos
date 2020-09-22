<?php
session_start();

require_once '../../class/conexion.php';
require_once '../../class/Empresa.php';
$cl_empresa = new Empresa();

$correo = filter_input(INPUT_POST, 'correo');
$contra = filter_input(INPUT_POST, 'clave');

$cl_empresa->setCorreo($correo);
$cl_empresa->setClave($contra);

$result = $cl_empresa->Login();

if ($result) {
  $_SESSION['panel'] = 'si';
  echo 'success';
} else {
  echo 'datos_incorrectos';
}

?>