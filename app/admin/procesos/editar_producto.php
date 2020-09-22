<?php
require_once '../../class/conexion.php';
require_once '../../class/Producto.php';
$cl_producto = new Producto();

$id = $_POST['id'];
$codigo = $_POST['codigo'];
$precioC = $_POST['precioC'];
$precioV = $_POST['precioV'];
$dscto = $_POST['dscto'];
$ficha = $_POST['ficha'];
$descripcion = $_POST['descripcion'];
$tags = $_POST['tags'];
$top = $_POST['top'];
$nuevo = $_POST['nuevo'];
$estado = $_POST['estado'];

$cl_producto->setId($id);
$cl_producto->setCodigo($codigo);
$cl_producto->setPrecio_compra($precioC);
$cl_producto->setPrecio_venta($precioV);
$cl_producto->setDescuento($dscto);
$cl_producto->setFicha_tecnica($ficha);
$cl_producto->setDescripcion($descripcion);
$cl_producto->setTags($tags);
$cl_producto->setTop($top);
$cl_producto->setNuevo($nuevo);
$cl_producto->setEstado($estado);

$result = $cl_producto->update_producto();

if ($result) {
    echo 'success_update_producto';
} else {
    echo 'error';
}
?>