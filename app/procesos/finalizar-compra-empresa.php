<?php
session_start();
date_default_timezone_set("America/Lima");
$fecha = date("Y-m-d");
$hora = date("H:i:s");

require_once '../class/conexion.php';
require_once '../class/Pedido.php';
require_once '../class/Detalle_pedido.php';

$cl_pedido = new Pedido();
$cl_detalle_pedido = new Detalle_pedido();

$total = 0;
foreach ($_SESSION['carrito'] as $indice => $producto) {
  $total = $total + ($producto['precio'] * $producto['cantidad']);
}

$generar_codigo = $cl_pedido->generar_codigo();
$year = date("Y");
    if (strlen($generar_codigo) == 1) {
        $cod = $year.'-0000'.$generar_codigo;
    }
    if (strlen($generar_codigo) == 2) {
        $cod = $year.'-000'.$generar_codigo;
    }
    if (strlen($generar_codigo) == 3) {
        $cod = $year.'-00'.$generar_codigo;
    }
    if (strlen($generar_codigo) == 4) {
        $cod = $year.'-0'.$generar_codigo;
    }
    if (strlen($generar_codigo) == 5) {
        $cod = $year.'-0'.$generar_codigo;
    }
    if (strlen($generar_codigo) == 6) {
        $cod = $year.'-'.$generar_codigo;
    }

$direccion = filter_input(INPUT_POST, 'empresa_direccion');
$referencia = filter_input(INPUT_POST, 'empresa_referencia');
$ubicacion = filter_input(INPUT_POST, 'empresa_ubicacion');
$estado = 'Pendiente';


$cl_pedido->setUbicacion($ubicacion);
$cl_pedido->setDireccion($direccion);
$cl_pedido->setReferencia($referencia);
$cl_pedido->setFecha($fecha);
$cl_pedido->setHora($hora);
$cl_pedido->setTotal($total);
$cl_pedido->setCliente_id($_SESSION['id_cliente']);
$cl_pedido->setEstado($estado);
$cl_pedido->setNum_pedido($cod);

$ID_pedido = $cl_pedido->reg_pedido();

$count_productos = count($_SESSION['carrito']);
$cont = 0;
foreach ($_SESSION['carrito'] as $indice => $producto) {
    $cl_detalle_pedido->setProducto_id($producto['id']);
    $cl_detalle_pedido->setPrecio($producto['precio']);
    $cl_detalle_pedido->setCantidad($producto['cantidad']);
    $cl_detalle_pedido->setPedido_id($ID_pedido);

    $result = $cl_detalle_pedido->reg_detalle_pedido();
    $cont++;
}

if ($cont == $count_productos) {
    unset($_SESSION['carrito']);

    $resultado = array(
        'codigo' => $cod,
        'count_carrito' => 0
      );
      echo json_encode($resultado);
}
?>