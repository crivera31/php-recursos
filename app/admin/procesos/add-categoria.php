<?php
require_once '../../class/conexion.php';
require_once '../../class/Categoria.php';
$cl_categoria = new Categoria();

$id_familia = $_POST['id'];
$nombre = $_POST['nombre'];
$categoria = $_POST['name'];
$name = 'categoria ' .$categoria;

$cl_categoria->setNombre($nombre);
$cl_categoria->setPadre_id($id_familia);
$cl_categoria->setDescripcion($name);

$result= $cl_categoria->add_categoria(); //retorna el id de la categoria

if ($result) {
  echo 'success-categoria';
} else {
  echo 'error';
}



?>