<?php 
require_once '../../class/conexion.php';
require_once '../../class/Empresa.php';
$cl_empresa = new Empresa();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$contacto = $_POST['contacto'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$direccion = $_POST['direccion'];
$ubicacion = $_POST['ubicacion'];
$igv = $_POST['igv'];
$dolar = $_POST['dolar'];

$cl_empresa->setId($id);
$cl_empresa->setNombre($nombre);
$cl_empresa->setPersona($contacto);
$cl_empresa->setCorreo($correo);
$cl_empresa->setCelular($celular);
$cl_empresa->setDireccion($direccion);
$cl_empresa->setUbicacion($ubicacion);
$cl_empresa->setIgv($igv);
$cl_empresa->setDolar($dolar);

$result = $cl_empresa->update_empresa();

if ($result) {
    echo 'success';
} else {
    echo 'error';
}
?>