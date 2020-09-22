<?php
require_once '../class/Practicante.php';
$cl_practicante = new Practicante();

$nombre = filter_input(INPUT_POST, 'nombres');
$ape_paterno = filter_input(INPUT_POST, 'ap_paterno');
$ape_materno = filter_input(INPUT_POST, 'ap_materno');
$dni = filter_input(INPUT_POST, 'dni');
$telefono = filter_input(INPUT_POST, 'telefono');
$correo = filter_input(INPUT_POST, 'correo');
$departamento = filter_input(INPUT_POST, 'departamento');
$provincia = filter_input(INPUT_POST, 'provincia');
$distrito = filter_input(INPUT_POST, 'distrito');
$direccion = filter_input(INPUT_POST, 'direccion');
$pedido = filter_input(INPUT_POST, 'pedido');
$documentos = filter_input(INPUT_POST, 'documento');

$fecha_registro = filter_input(INPUT_POST, 'fecha');// en formato 20/04/2012
$date = str_replace('/', '-', $fecha_registro); 
$fecha = date("Y-m-d", strtotime($date));

$ubicacion = $departamento.'/'.$provincia.'/'.$distrito;

if (trim($nombre) == '' || trim($ape_paterno) == '' || trim($ape_materno) == '' || trim($dni) == '' 
|| trim($telefono) == '' || trim($departamento) == '' || trim($provincia) == '' || trim($distrito) == '' || trim($direccion) == '' || trim($pedido) == '' || trim($documentos) == '') {
  echo 'llenar_campos';
} else {
  $cl_practicante->setNombre($nombre);
  $cl_practicante->setApaterno($ape_paterno);
  $cl_practicante->setAmaterno($ape_materno);
  $cl_practicante->setDni($dni);
  $cl_practicante->setTelefono($telefono);
  $cl_practicante->setCorreo($correo);
  $cl_practicante->setUbicacion($ubicacion);
  $cl_practicante->setDireccion($direccion);
  $cl_practicante->setDescrip_pedido($pedido);
  $cl_practicante->setDocumento_adjuntados($documentos);
  $cl_practicante->setFecha($fecha);

  $result = $cl_practicante->Add_practicante();
  if ($result) {
    echo 'agregado';
  } else {
    echo 'error';
  }
}
?>