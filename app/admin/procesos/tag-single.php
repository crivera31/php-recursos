<?php
require_once '../../class/conexion.php';
require_once '../../class/Categoria.php';
$cl_categoria = new Categoria();

$id = $_POST['id'];
$cl_categoria->setId($id);

$result = $cl_categoria->tag_single();

$json = array();
foreach ($result as $row) {
  $json[] = array(
    'id' => $row['id'],
    'nombre' => $row['nombre']
    // 'description' => $row['descripcion']
  );
}
$jsonstring = json_encode($json[0]); //el json esta convertido en string
echo $jsonstring;

?>