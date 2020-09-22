<?php
session_start();

require_once '../class/conexion.php';
require_once '../class/Cliente.php';
require_once '../class/Distrito.php';
$cl_distrito = new Distrito();
$cl_cliente = new Cliente();

$nombre_comercial = filter_input(INPUT_POST, 'nombre_comercial');
$razon_social = filter_input(INPUT_POST, 'razon_social');
$ruc = filter_input(INPUT_POST, 'ruc');
$nombre_titular = filter_input(INPUT_POST, 'nombre_titular');
$apellido_titular = filter_input(INPUT_POST, 'apellido_titular');
$direccion = filter_input(INPUT_POST, 'direccion_e');
$distrito = filter_input(INPUT_POST, 'distrito');
$correo = filter_input(INPUT_POST, 'email_e');
$contra = filter_input(INPUT_POST, 'pass_e');
$celular = filter_input(INPUT_POST, 'celular_e');
/*datos del contacto */
$nombre_c = filter_input(INPUT_POST, 'contacto_nombre');
$apellido_p = filter_input(INPUT_POST, 'contacto_apellidoP');
$apellido_m = filter_input(INPUT_POST, 'contacto_apellidoM');
$dni_c = filter_input(INPUT_POST, 'contacto_dni');
$cargo_c = filter_input(INPUT_POST, 'contacto_cargo');
$celular_c = filter_input(INPUT_POST, 'contacto_celular');
$correo_c = filter_input(INPUT_POST, 'contacto_correo');

$cl_distrito->setId($distrito);

$cl_distrito->mostrar_ubicacion();

$cad1 = $cl_distrito->getDepartamento();
$cad2 = $cl_distrito->getProvincia();
$cad3 = $cl_distrito->getDistrito();
$ubicacion = $cad1 . ' / ' . $cad2 . ' / ' . $cad3;

/**contacto */
$cl_cliente->setNombres($nombre_c);
$cl_cliente->setApe_paterno($apellido_p);
$cl_cliente->setApe_materno($apellido_m);
$cl_cliente->setDni($dni_c);
$cl_cliente->setContacto_cargo($cargo_c);
$cl_cliente->setContacto_celular($celular_c);
$cl_cliente->setContacto_correo($correo_c);
/**fin_contacto */
$cl_cliente->setNombre_comercial($nombre_comercial);
$cl_cliente->setRazon_social($razon_social);
$cl_cliente->setRuc($ruc);
$cl_cliente->setNombre_titular($nombre_titular);
$cl_cliente->setApellido_titular($apellido_titular);
$cl_cliente->setDireccion($direccion);
$cl_cliente->setUbicacion($ubicacion);
$cl_cliente->setCorreo($correo);
$cl_cliente->setContra($contra);
$cl_cliente->setCelular($celular);

$result = $cl_cliente->Reg_empresa();

if ($result) {
  // $_SESSION['active'] = true;
  // $_SESSION['id_cliente'] = $cl_cliente->getId();
  // $_SESSION['n_cliente'] = $cl_cliente->getNombres();
  echo 'success';
}
?>