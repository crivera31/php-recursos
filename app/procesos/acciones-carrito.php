<?php
session_start();
require_once '../class/config.php';

$accion = $_POST['btnAccion'];

switch ($accion) {
  case 'Agregar':
    $id = $_POST['id'];
    $codigo = $_POST['codigo'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $foto = $_POST['foto'];

    if (!isset($_SESSION['carrito'])) { //si no hay nada en carrito
      $productos = array(
        'id' => $id,
        'codigo' => $codigo,
        'foto' => $foto,
        'precio' => $precio,
        'cantidad' => $cantidad
      );
      $_SESSION['carrito'][0] = $productos; //en la posicion 0
      // $msj = 'El producto fue agregado al carrito.';
      $msj = 'agregado';
    } else {
      //para meter mas data
      $id_producto = array_column($_SESSION['carrito'], 'id');
      if (in_array($id, $id_producto)) {
        // $msj = 'REPETIDO';
        $NumeroProductos = count($_SESSION['carrito']);
        for ($i = 0; $i < $NumeroProductos; $i++) {
          if ($id == $_SESSION['carrito'][$i]['id']) {
            while (0 < $cantidad) {
            $_SESSION['carrito'][$i]['cantidad']++;
            $cantidad--;
            }
          }
        }
        $msj="Producto agregado al carrito";
      } else {
        $count_productos = count($_SESSION['carrito']); //contar la cantidad de data
        $productos = array(
          'id' => $id,
          'codigo' => $codigo,
          'foto' => $foto,
          'precio' => $precio,
          'cantidad' => $cantidad
        );
        array_push($_SESSION['carrito'], $productos);
        // $_SESSION['carrito'][$count_productos+1] = $productos;
        // $msj = 'El producto fue agregado al carrito.';
        $msj = 'agregado';
      }
    }
    $resultado = array(
      'mensaje' => $msj,
      'count_carrito' => count($_SESSION['carrito'])
    );
    echo json_encode($resultado);
    break;

    case 'Eliminar':
      $id = $_POST['idRow'];
      foreach ($_SESSION['carrito'] as $indice => $producto) {
        if($producto['id'] == $id){
          unset($_SESSION['carrito'][$indice]);
        }
      }
      $items = count($_SESSION['carrito']);
      $resultado = array(
        "mensaje" => "borrado",
        "count_carrito" => $items
      );
      echo json_encode($resultado);
    break;

  default:
    break;
}

?>