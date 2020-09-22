<?php
require_once '../../class/conexion.php';
require_once '../../class/Categoria.php';
$cl_categoria = new Categoria();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$cl_categoria->setId($id);
$cl_categoria->setNombre($nombre);

$result = $cl_categoria->tag_edit();
if($result) {
  echo 'success-edit';
}


?>