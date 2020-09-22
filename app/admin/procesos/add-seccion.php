<?php
require_once '../../class/conexion.php';
require_once '../../class/Categoria.php';
$cl_categoria = new Categoria();

$id_seccion = $_POST['id'];
$seccion = $_POST['seccion'];
$categoria = $_POST['name'];
$descripcion = 'seccion ' .$categoria;

$cl_categoria->setNombre($seccion);
$cl_categoria->setPadre_id($id_seccion);
$cl_categoria->setDescripcion($descripcion);

$result= $cl_categoria->add_seccion();
if ($result) {
  echo 'success-seccion';
} else {
  echo 'error';
}
?>