<?php
session_start();
$arreglo = $_SESSION['carrito'];
$id = $_POST['id'];
$cantidad = $_POST['cantidad'];

for ($i=0; $i < count($arreglo); $i++) { 
    if ($arreglo[$i]['id'] == $id) {
        $arreglo[$i]['cantidad'] = $cantidad;
        $_SESSION['carrito'] = $arreglo;
        echo 'cambio_cantidad';
    break;
    }
}
?>