<?php
require_once '../../class/conexion.php';
require_once '../../class/Categoria.php';
$cl_categoria = new Categoria();
$result = $cl_categoria->Mostrar_TODO();

$json = array();
foreach ($result as $row) {
  $json[] = array(
    'id' => $row['id'],
    'nombre' => $row['nombre'],
    'estado' => $row['estado'],
    'fecha' => date("d-m-Y", strtotime($row['fecha']))
  );
}
$jsonstring = json_encode($json);
echo $jsonstring;
 
?>