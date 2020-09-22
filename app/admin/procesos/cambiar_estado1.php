<?php
require_once '../../class/conexion.php';
require_once '../../class/Categoria.php';
$cl_categoria = new Categoria();

$id = $_POST['id'];

$cl_categoria->setId($id);

$result= $cl_categoria->habilitar_categoria();
if ($result) {
  echo 'success';
} else {
  echo 'error';
}
?>