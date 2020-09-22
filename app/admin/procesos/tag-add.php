<?php
require_once '../../class/conexion.php';
require_once '../../class/Categoria.php';
$cl_categoria = new Categoria();

$nombre = $_POST['nombre'];
$descri = 'familia ' .$nombre;
$cl_categoria->setNombre($nombre);
$cl_categoria->setDescripcion($descri);

$result = $cl_categoria->tag_add();

if($result) {
  echo 'success';
}


?>