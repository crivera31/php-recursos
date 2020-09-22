<?php
require_once '../class/conexion.php';
require_once '../class/Cliente.php';
$cl_cliente = new Cliente();

$id = filter_input(INPUT_POST, 'id-profile');
$nombre = filter_input(INPUT_POST, 'names');
$a_paterno = filter_input(INPUT_POST, 'a_paterno');
$a_materno = filter_input(INPUT_POST, 'a_materno');
$dni = filter_input(INPUT_POST, 'dni');
$correo = filter_input(INPUT_POST, 'correo');
$celular = filter_input(INPUT_POST, 'celular');
$contra_nueva = filter_input(INPUT_POST, 'up-pass');

if ($contra_nueva == '') { //no se cambia

    $cl_cliente->setId($id);
    $cl_cliente->setNombres($nombre);
    $cl_cliente->setApe_paterno($a_paterno);
    $cl_cliente->setApe_materno($a_materno);
    $cl_cliente->setDni($dni);
    $cl_cliente->setCorreo($correo);
    $cl_cliente->setCelular($celular);

    $result1 = $cl_cliente->Update_profile(0);
    if ($result1) {
        echo 'success';
    } else {
        echo 'error al actualizar1';
    }
} else { //se hará el cambio

    $cl_cliente->setId($id);
    $cl_cliente->setNombres($nombre);
    $cl_cliente->setApe_paterno($a_paterno);
    $cl_cliente->setApe_materno($a_materno);
    $cl_cliente->setDni($dni);
    $cl_cliente->setCorreo($correo);
    $cl_cliente->setCelular($celular);
    $cl_cliente->setContra($contra_nueva);

    $result2 = $cl_cliente->Update_profile(1);
    if ($result2) {
        echo 'success';
    } else {
        echo 'error al actualizar2';
    }
}


?>