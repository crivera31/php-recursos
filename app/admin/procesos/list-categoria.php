<?php
//carga en el select 
require_once '../../class/conexion.php';
require_once '../../class/Categoria.php';
$cl_categoria = new Categoria();

$dato = $_POST['dato'];
$cl_categoria->setPadre_id($dato);

$result = $cl_categoria->carga_select_categoria();

$json = array();
foreach ($result as $row) {
  $json[] = array(
    'id' => $row['id'],
    'nombre' => $row['nombre'],
    'padre_id' => $row['padre_id']
  );
}
$jsonstring = json_encode($json);
echo $jsonstring;
 
?>