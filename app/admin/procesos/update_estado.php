<?php 
require_once '../../class/conexion.php';
require_once '../../class/Pedido.php';
$cl_pedido = new Pedido();

$id = $_POST['id'];
$estado = $_POST['estado'];


$cl_pedido->setId($id);
$cl_pedido->setEstado($estado);

$result = $cl_pedido->update_estado_pedido();

if ($result) {
    echo $estado;
} else {
    echo 'error';
}
?>