<?php
class Empresa{
  private $id;
  private $nombre;
  private $ruc;
  private $persona;
  private $correo;
  private $clave;
  private $celular;
  private $direccion;
  private $ubicacion;
  private $igv;
  private $dolar;

  function Login()
  {
    $existe = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "SELECT * FROM empresa
                  WHERE correo = :correo and clave = :pass";
        $data = $conn->prepare($query);
        $data->bindParam(':correo', $this->correo);
        $data->bindParam(':pass', $this->clave);
        $data->execute();
    } catch (PDOException $e) {
      die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
    }

    // $row = $data->fetchAll(PDO::FETCH_ASSOC);
    $row_count = $data->rowCount();

    if ($row_count > 0) {
      $existe = true;
    } else {
      $existe = false;
    }
    $conn = null;
    return $existe;
}

  function Mostrar_datos()
  {
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "SELECT * FROM empresa";
        $data = $conn->query($query);
        $data->execute();
    } catch (PDOException $e) {
        die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
    }
    
    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $fila;
  }

  public function update_empresa()
  {
      $grabado = false;
      $db = new conexionDB();
      $conn = $db->getConexion();
      try {
          $query = "UPDATE empresa SET nombre = :nombre, persona = :persona, correo = :correo, celular = :celular,
                    direccion = :direccion, ubicacion = :ubicacion, igv = :igv, dolar = :dolar where id = :id";
          $data = $conn->prepare($query);
          $data->bindParam(':id', $this->id);
          $data->bindParam(':nombre', $this->nombre);
          $data->bindParam(':persona', $this->persona);
          $data->bindParam(':correo', $this->correo);
          $data->bindParam(':celular', $this->celular);
          $data->bindParam(':direccion', $this->direccion);
          $data->bindParam(':ubicacion', $this->ubicacion);
          $data->bindParam(':igv', $this->igv);
          $data->bindParam(':dolar', $this->dolar);
          $data->execute();
      } catch(PDOException $e){
          die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
      }
  
      if ($data) {
          $grabado = true;
        } else {
          $grabado = false;
        }
        $conn = null;
        return $grabado;
    }

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getNombre()
  {
    return $this->nombre;
  }

  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  public function getRuc()
  {
    return $this->ruc;
  }

  public function setRuc($ruc)
  {
    $this->ruc = $ruc;
  }

  public function getPersona()
  {
    return $this->persona;
  }

  public function setPersona($persona)
  {
    $this->persona = $persona;
  }

  public function getCorreo()
  {
    return $this->correo;
  }

  public function setCorreo($correo)
  {
    $this->correo = $correo;
  }

  public function getCelular()
  {
    return $this->celular;
  }

  public function setCelular($celular)
  {
    $this->celular = $celular;
  }

  public function getDireccion()
  {
    return $this->direccion;
  }

  public function setDireccion($direccion)
  {
    $this->direccion = $direccion;
  }

  public function getIgv()
  {
    return $this->igv;
  }

  public function setIgv($igv)
  {
    $this->igv = $igv;
  }

  public function getDolar()
  {
    return $this->dolar;
  }

  public function setDolar($dolar)
  {
    $this->dolar = $dolar;
  }

  public function getUbicacion()
  {
    return $this->ubicacion;
  }

  public function setUbicacion($ubicacion)
  {
    $this->ubicacion = $ubicacion;
  }

  public function getClave()
  {
    return $this->clave;
  }

  public function setClave($clave)
  {
    $this->clave = $clave;
  }
}

?>