<?php
require_once '../class/conexion.php';
require_once '../class/Producto.php';
$cl_producto = new Producto();
$result = $cl_producto->Mostrar_5_top();

$json = array();
foreach ($result as $row) {
  $json[] = array(
    'id' => $row['id'],
    'codigo' => $row['codigo'],
    'precio_compra' => $row['precio_compra'],
    'precio_venta' => $row['precio_venta'],
    'foto' => $row['foto']
  );
}
$jsonstring = json_encode($json);
echo $jsonstring;

?>