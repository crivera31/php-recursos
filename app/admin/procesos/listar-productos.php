<?php
require_once '../../class/conexion.php';
require_once '../../class/Producto.php';
$cl_producto = new Producto();
$result = $cl_producto->Mostrar_admin();

$json = array();
foreach ($result as $row) {
  $json[] = array(
    'id' => $row['id'],
    'codigo' => $row['codigo'],
    'foto' => $row['foto'],
    'precio_compra' => $row['precio_compra'],
    'precio_venta' => $row['precio_venta'],
    'estado' => $row['estado'], //para habilitar o no 
    'top' => $row['top'], //los 5 mas vendidos
    'fecha' => date("d/m/Y", strtotime($row['fecha'])) //para habilitar o no 
  );
}
$jsonstring = json_encode($json);
echo $jsonstring;
 
?>