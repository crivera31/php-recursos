<?php
class Detalle_Pedido
{
  private $id;
  private $producto_id;
  private $precio;
  private $cantidad;
  private $pedido_id;

  public function reg_detalle_pedido()
  {
    $db = new conexionDB();
    $conn = $db->getConexion();
    try {
      $query = "INSERT INTO detalles_pedidos(producto_id, precio, cantidad, pedido_id) 
      VALUES (:producto_id, :precio, :cantidad, :pedido_id)";
      $data = $conn->prepare($query);
      $data->bindParam(':producto_id', $this->producto_id);
      $data->bindParam(':precio', $this->precio);
      $data->bindParam(':cantidad', $this->cantidad);
      $data->bindParam(':pedido_id', $this->pedido_id);
      $data->execute();
    } catch (PDOException $e) {
      die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
    }

    $conn = null;
    // return $grabado;
  }

  public function ver_detalle_pedido()
  {
    $db = new conexionDB();
    $conn = $db->getConexion();
    try {
      $query = "SELECT prod.codigo as codigo, prod.foto as foto, det.producto_id as id_prod,
                det.precio as precio,det.cantidad as cantidad
                FROM `detalles_pedidos` det
                inner JOIN productos prod
                ON (det.producto_id = prod.id)
                where det.pedido_id = :id
                order by det.producto_id asc";
      $data = $conn->prepare($query);
      $data->bindParam(':id', $this->pedido_id);
      $data->execute();
    } catch (PDOException $e) {
      die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);

    $conn = null;
    return $fila;
  }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getProducto_id()
  {
    return $this->producto_id;
  }

  public function setProducto_id($producto_id)
  {
    $this->producto_id = $producto_id;
  }

  public function getPrecio()
  {
    return $this->precio;
  }

  public function setPrecio($precio)
  {
    $this->precio = $precio;
  }

  public function getCantidad()
  {
    return $this->cantidad;
  }

  public function setCantidad($cantidad)
  {
    $this->cantidad = $cantidad;
  }

  public function getPedido_id()
  {
    return $this->pedido_id;
  }

  public function setPedido_id($pedido_id)
  {
    $this->pedido_id = $pedido_id;
  }
  
}

?>