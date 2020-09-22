<?php 
require_once '../../class/conexion.php';
require_once '../../class/Producto.php';
$cl_producto = new Producto();

$code = $_POST['code'];
$categoria = $_POST['categoria'];
$seccion = $_POST['seccion_aux'];

$cl_producto->setCodigo($code);
$cl_producto->setPadre_id($categoria);
$cl_producto->setCategoria_id($seccion);

$result = $cl_producto->update_categoria();

if ($result) {
    echo 'success';
} else {
    echo 'error';
}
?>