<?php
require_once '../class/conexion.php';
require_once '../class/Cliente.php';
$cl_cliente = new Cliente();

$id = filter_input(INPUT_POST, 'id-profile');
$nombre_c = filter_input(INPUT_POST, 'nombre_c');
$c_paterno = filter_input(INPUT_POST, 'c_paterno');
$c_materno = filter_input(INPUT_POST, 'c_materno');
$c_dni = filter_input(INPUT_POST, 'c_dni');
$c_correo = filter_input(INPUT_POST, 'c_correo');
$c_celular = filter_input(INPUT_POST, 'c_celular');
$c_cargo = filter_input(INPUT_POST, 'c_cargo');
$contra_nueva = filter_input(INPUT_POST, 'pass');

if ($contra_nueva == '') { //no se cambia

    $cl_cliente->setId($id);
    $cl_cliente->setNombres($nombre_c);
    $cl_cliente->setApe_paterno($c_paterno);
    $cl_cliente->setApe_materno($c_materno);
    $cl_cliente->setDni($c_dni);
    $cl_cliente->setContacto_correo($c_correo);
    $cl_cliente->setContacto_celular($c_celular);
    $cl_cliente->setContacto_cargo($c_cargo);

    $result1 = $cl_cliente->Update_profile(0);
    if ($result1) {
        echo 'success';
    } else {
        echo 'error al actualizar1';
    }
} else { //se hará el cambio

    $cl_cliente->setId($id);
    $cl_cliente->setNombres($nombre_c);
    $cl_cliente->setApe_paterno($c_paterno);
    $cl_cliente->setApe_materno($c_materno);
    $cl_cliente->setDni($c_dni);
    $cl_cliente->setContacto_correo($c_correo);
    $cl_cliente->setContacto_celular($c_celular);
    $cl_cliente->setContacto_cargo($c_cargo);
    $cl_cliente->setContra($contra_nueva);

    $result2 = $cl_cliente->Update_profile(1);
    if ($result2) {
        echo 'success';
    } else {
        echo 'error al actualizar2';
    }
}


?>