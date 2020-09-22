<?php
require_once '../../class/conexion.php';
require_once '../../class/Categoria.php';
$cl_categoria = new Categoria();
$result = $cl_categoria->carga_menus();

// $json = array();
foreach ($result as $row) {
  $json[] = array(
    'id' => $row['id'],
    'nombre' => $row['nombre'],
    'padre' => $row['padre'],
    'descripcion' => $row['descripcion'],
    'estado' => $row['estado']
  );
}
$jsonstring = json_encode($json);
echo $jsonstring;
?>