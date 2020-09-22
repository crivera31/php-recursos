<?php
class Pedido
{
  private $id;
  private $nombres;
  private $apellidos;
  private $dni;
  private $correo;
  private $ubicacion;
  private $direccion;
  private $celular;
  private $referencia;
  private $fecha; //guarda la fecha y hora
  private $hora;
  private $total;
  private $cliente_id;
  private $estado;
  private $num_pedido;

  private $razon;
  private $comercial;
  private $ruc;
  private $tipo;

  function update_estado_pedido()
{
    $verificar = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "UPDATE pedidos SET estado = :estado WHERE id = :id";
        $data = $conn->prepare($query);
        $data->bindParam(':estado', $this->estado);
        $data->bindParam(':id', $this->id);
        $data->execute();
    } catch (PDOException $e) {
        die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
    }

    if ($data) {
        $verificar = true;
    } else {
        $verificar = false;
    }

    $conn = null;
    return $verificar;
}

  public function verificar($pedido_id,$cliente_id)
  {
      $verificar = false;
      $db = new conexionDB();
      $conn = $db->getConexion();
      try {
          $query = "SELECT * FROM pedidos
                    WHERE id = $pedido_id and cliente_id = $cliente_id";
          $data = $conn->query($query);
          $data->execute();
      } catch(PDOException $e){
          die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
      }
  
      $row_count = $data->rowCount();
        if ($row_count > 0) {
            $verificar = true;
        } else {
            $verificar = false;
        }

        $conn = null;
        return $verificar;
    }

  public function ver_detalle_pedido_destino()
  {
    $db = new conexionDB();
    $conn = $db->getConexion();
    try {
      $query = "SELECT cl.nombres,cl.ape_paterno,cl.ape_materno,cl.correo,cl.celular,cl.dni,
                cl.razon_social,cl.nombre_comercial,cl.ruc,cl.tipo,
                ped.id,ped.fecha,ped.hora,ped.direccion ,ped.ubicacion, ped.referencia,ped.num_pedido,ped.estado
                FROM pedidos ped
                INNER JOIN clientes cl
                ON cl.id = ped.cliente_id
                WHERE ped.id = :id";
      $data = $conn->prepare($query);
      $data->bindParam(':id', $this->id);
      $data->execute();
    } catch (PDOException $e) {
      die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    $row_count = $data->rowCount();

    if ($row_count >0) {
        $existe = true;
        foreach($fila as $row){
            $this->id = $row ['id'];
            $this->tipo = $row ['tipo'];
            $this->nombres = $row['nombres']; /**dato del contacto */
            $this->apellidos = $row['ape_paterno']. ' '.$row['ape_materno'];/**dato del contacto */
            $this->dni = $row['dni'];/**dato del contacto */
            $this->razon = $row['razon_social'];
            $this->comercial = $row['nombre_comercial'];
            $this->ruc = $row['ruc'];
            $this->correo = $row['correo'];
            $this->ubicacion = $row['ubicacion'];
            $this->direccion = $row['direccion'];
            $this->celular = $row['celular'];
            $this->referencia = $row['referencia'];
            $this->fecha = $row['fecha'];
            $this->hora = $row['hora'];
            $this->num_pedido = $row['num_pedido'];
            $this->estado = $row['estado'];
        }
    } else {
        $existe = false;
    }

    $conn = null;
    return $existe;
  }

  public function generar_codigo()
  {
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "SELECT LAST_INSERT_ID(id) as codigo FROM pedidos order by id desc limit 0,1 ";
        $data = $conn->query($query);
        $data->execute();
    } catch(PDOException $e){
        die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
    }

    $dato = $data->fetchColumn();
    $codigo = $dato + 1;

    $conn = null;
    return $codigo;
  }

  public function reg_pedido(){
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "INSERT INTO pedidos(ubicacion, direccion, referencia, fecha, hora, total, cliente_id, estado, num_pedido) 
        VALUES(:ubicacion, :direccion, :referencia, :fecha, :hora, :total, :cliente_id, :estado, :num_pedido)";
        $data = $conn->prepare($query);
        $data->bindParam(':ubicacion', $this->ubicacion);
        $data->bindParam(':direccion', $this->direccion);
        $data->bindParam(':referencia', $this->referencia);
        $data->bindParam(':fecha', $this->fecha);
        $data->bindParam(':hora', $this->hora);
        $data->bindParam(':total', $this->total);
        $data->bindParam(':cliente_id', $this->cliente_id);
        $data->bindParam(':estado', $this->estado);
        $data->bindParam(':num_pedido', $this->num_pedido);
        $data->execute();
    } catch(PDOException $e){
        die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
    }

    if ($data) {
        $id_venta = $conn->lastInsertId();
      } else {
      }
      $conn = null;
      return $id_venta;
  }
  
  public function finalizar_compra()
  {
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "SELECT num_pedido, fecha, total FROM pedidos WHERE num_pedido = :num_pedido";
        $data = $conn->prepare($query);
        $data->bindParam(':num_pedido', $this->num_pedido);
        $data->execute();
    } catch(PDOException $e){   
        die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    $row_count = $data->rowCount();

    if ($row_count >0) {
        $existe = true;
        foreach($fila as $row){
            // $this->id = $row ['id'];
            $this->num_pedido = $row['num_pedido'];
            $this->fecha = $row['fecha'];
            $this->total = $row['total'];
        }
    } else {
        $existe = false;
    }

    $conn = null;
    return $existe;
  }

  public function ver_pedido()
  {
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "SELECT * FROM pedidos WHERE cliente_id = :cliente_id";
        $data = $conn->prepare($query);
        $data->bindParam(':cliente_id', $this->cliente_id);
        $data->execute();
    } catch(PDOException $e){
        die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);

    $conn = null;
    return $fila;
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;
  }

  /**
   * Get the value of nombres
   */ 
  public function getNombres()
  {
    return $this->nombres;
  }

  /**
   * Set the value of nombres
   *
   * @return  self
   */ 
  public function setNombres($nombres)
  {
    $this->nombres = $nombres;
  }

  /**
   * Get the value of apellidos
   */ 
  public function getApellidos()
  {
    return $this->apellidos;
  }

  /**
   * Set the value of apellidos
   *
   * @return  self
   */ 
  public function setApellidos($apellidos)
  {
    $this->apellidos = $apellidos;
  }

  /**
   * Get the value of correo
   */ 
  public function getCorreo()
  {
    return $this->correo;
  }

  /**
   * Set the value of correo
   *
   * @return  self
   */ 
  public function setCorreo($correo)
  {
    $this->correo = $correo;
  }

  /**
   * Get the value of direccion
   */ 
  public function getDireccion()
  {
    return $this->direccion;
  }

  /**
   * Set the value of direccion
   *
   * @return  self
   */ 
  public function setDireccion($direccion)
  {
    $this->direccion = $direccion;
  }

  /**
   * Get the value of fecha
   */ 
  public function getFecha()
  {
    return $this->fecha;
  }

  /**
   * Set the value of fecha
   *
   * @return  self
   */ 
  public function setFecha($fecha)
  {
    $this->fecha = $fecha;
  }

  /**
   * Get the value of total
   */ 
  public function getTotal()
  {
    return $this->total;
  }

  /**
   * Set the value of total
   *
   * @return  self
   */ 
  public function setTotal($total)
  {
    $this->total = $total;
  }

  /**
   * Get the value of cliente_id
   */ 
  public function getCliente_id()
  {
    return $this->cliente_id;
  }

  /**
   * Set the value of cliente_id
   *
   * @return  self
   */ 
  public function setCliente_id($cliente_id)
  {
    $this->cliente_id = $cliente_id;
  }

  /**
   * Get the value of hora
   */ 
  public function getHora()
  {
    return $this->hora;
  }

  /**
   * Set the value of hora
   *
   * @return  self
   */ 
  public function setHora($hora)
  {
    $this->hora = $hora;
  }

  /**
   * Get the value of estado
   */ 
  public function getEstado()
  {
    return $this->estado;
  }

  /**
   * Set the value of estado
   *
   * @return  self
   */ 
  public function setEstado($estado)
  {
    $this->estado = $estado;

    return $this;
  }

  /**
   * Get the value of num_pedido
   */ 
  public function getNum_pedido()
  {
    return $this->num_pedido;
  }

  /**
   * Set the value of num_pedido
   *
   * @return  self
   */ 
  public function setNum_pedido($num_pedido)
  {
    $this->num_pedido = $num_pedido;

    return $this;
  }

  /**
   * Get the value of celular
   */ 
  public function getCelular()
  {
    return $this->celular;
  }

  /**
   * Set the value of celular
   *
   * @return  self
   */ 
  public function setCelular($celular)
  {
    $this->celular = $celular;

    return $this;
  }

  /**
   * Get the value of referencia
   */ 
  public function getReferencia()
  {
    return $this->referencia;
  }

  /**
   * Set the value of referencia
   *
   * @return  self
   */ 
  public function setReferencia($referencia)
  {
    $this->referencia = $referencia;

    return $this;
  }

  /**
   * Get the value of ubicacion
   */ 
  public function getUbicacion()
  {
    return $this->ubicacion;
  }

  /**
   * Set the value of ubicacion
   *
   * @return  self
   */ 
  public function setUbicacion($ubicacion)
  {
    $this->ubicacion = $ubicacion;

    return $this;
  }

  /**
   * Get the value of dni
   */ 
  public function getDni()
  {
    return $this->dni;
  }

  /**
   * Set the value of dni
   *
   * @return  self
   */ 
  public function setDni($dni)
  {
    $this->dni = $dni;

    return $this;
  }

  /**
   * Get the value of razon
   */ 
  public function getRazon()
  {
    return $this->razon;
  }

  /**
   * Set the value of razon
   *
   * @return  self
   */ 
  public function setRazon($razon)
  {
    $this->razon = $razon;

    return $this;
  }

  /**
   * Get the value of comercial
   */ 
  public function getComercial()
  {
    return $this->comercial;
  }

  /**
   * Set the value of comercial
   *
   * @return  self
   */ 
  public function setComercial($comercial)
  {
    $this->comercial = $comercial;

    return $this;
  }

  /**
   * Get the value of ruc
   */ 
  public function getRuc()
  {
    return $this->ruc;
  }

  /**
   * Set the value of ruc
   *
   * @return  self
   */ 
  public function setRuc($ruc)
  {
    $this->ruc = $ruc;

    return $this;
  }

  /**
   * Get the value of tipo
   */ 
  public function getTipo()
  {
    return $this->tipo;
  }

  /**
   * Set the value of tipo
   *
   * @return  self
   */ 
  public function setTipo($tipo)
  {
    $this->tipo = $tipo;

    return $this;
  }
}

?>