<?php
require_once '../../class/conexion.php';
require_once '../../class/Producto.php';
$cl_producto = new Producto();


$codigo = filter_input(INPUT_POST, 'codigo');
$categoria = filter_input(INPUT_POST, 'id_categoria');
$seccion = filter_input(INPUT_POST, 'id_seccion');
$precio_c = filter_input(INPUT_POST, 'precio_c');
$precio_v = filter_input(INPUT_POST, 'precio_v');
$dscto = filter_input(INPUT_POST, 'dscto');
$estado = filter_input(INPUT_POST, 'estado');
$ficha = filter_input(INPUT_POST, 'ficha');
$descripcion = filter_input(INPUT_POST, 'descripcion');
$top = filter_input(INPUT_POST, 'top');
$nuevo = filter_input(INPUT_POST, 'nuevo');

$nameFile = $_FILES["file"]["name"];
$permitidos = array("image/png","image/webp");

/**formato q se permiten */
if (in_array($_FILES['file']["type"], $permitidos)) {

  $cl_producto->setCodigo($codigo);
  $cl_producto->setPadre_id($categoria);
  $cl_producto->setCategoria_id($seccion);
  $cl_producto->setPrecio_compra($precio_c);
  $cl_producto->setPrecio_venta($precio_v);
  $cl_producto->setDescuento($dscto);
  $cl_producto->setEstado($estado);
  $cl_producto->setFicha_tecnica($ficha);
  $cl_producto->setDescripcion($descripcion);
  $cl_producto->setTop($top);
  $cl_producto->setNuevo($nuevo);
  $cl_producto->setFoto($nameFile);

  $result = $cl_producto->reg_producto();
  if ($result) {
    $ruta = '../../images/productos/';
    $archivo = $ruta . $_FILES["file"]["name"];
    $guardar = @move_uploaded_file($_FILES["file"]["tmp_name"], $archivo);
    if ($guardar) {
      echo "success_add_producto";
    } else {
      echo "error_guardar";
    }
  } else {
    echo 'error_query';
  }
} else {
  echo "error_extension";
}

?>