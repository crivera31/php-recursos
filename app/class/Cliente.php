<?php
class Cliente
{
  private $id;
  private $nombres;
  private $ape_paterno;
  private $ape_materno;
  private $dni;
  private $correo;
  private $contra;
  private $celular;

  private $razon_social;
  private $nombre_comercial;
  private $ruc;
  private $nombre_titular;
  private $apellido_titular;
  private $direccion;
  private $tipo;
  private $ubicacion;
  private $contacto_celular;
  private $contacto_cargo;
  private $contacto_correo;

  
  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Set the value of id

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

   */ 
  public function setNombres($nombres)
  {
    $this->nombres = $nombres;
  }

  /**
   * Get the value of ape_paterno
   */ 
  public function getApe_paterno()
  {
    return $this->ape_paterno;
  }

  /**
   * Set the value of ape_paterno

   */ 
  public function setApe_paterno($ape_paterno)
  {
    $this->ape_paterno = $ape_paterno;
  }

  /**
   * Get the value of ape_materno
   */ 
  public function getApe_materno()
  {
    return $this->ape_materno;
  }

  /**
   * Set the value of ape_materno

   */ 
  public function setApe_materno($ape_materno)
  {
    $this->ape_materno = $ape_materno;
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

   */ 
  public function setCorreo($correo)
  {
    $this->correo = $correo;
  }

  /**
   * Get the value of contra
   */ 
  public function getContra()
  {
    return $this->contra;
  }

  /**
   * Set the value of contra

   */ 
  public function setContra($contra)
  {
    $this->contra = $contra;
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

   */ 
  public function setCelular($celular)
  {
    $this->celular = $celular;
  }

  function Reg_cliente()
  {
      $verificar = false;
      $db = new conexionDB();
      $conn = $db->getConexion();

      try {
          $query = "INSERT INTO clientes(nombres,ape_paterno,ape_materno,dni,correo,contra,celular,tipo)
                    VALUES(:nombres, :paterno, :materno, :dni, :correo, :contra, :celular,1)";
          $data = $conn->prepare($query);
          $data->bindParam(':nombres', $this->nombres);
          $data->bindParam(':paterno', $this->ape_paterno);
          $data->bindParam(':materno', $this->ape_materno);
          $data->bindParam(':dni', $this->dni);
          $data->bindParam(':correo', $this->correo);
          $data->bindParam(':contra', $this->contra);
          $data->bindParam(':celular', $this->celular);
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

  function Reg_empresa()
  {
      $verificar = false;
      $db = new conexionDB();
      $conn = $db->getConexion();

      try {
          $query = "INSERT INTO clientes(nombres,ape_paterno,ape_materno,contacto_celular,contacto_cargo,contacto_correo,dni,
            nombre_titular,apellido_titular,ruc,razon_social,nombre_comercial,direccion,ubicacion,correo,contra,celular,tipo)
            VALUES(:c_nombres,:c_paterno,:c_materno,:c_celular,:c_cargo,:c_correo,:c_dni,
            :nom_titular, :ape_titular,:ruc, :razon, :comercial, :direccion, :ubicacion, :correo, :contra, :celular,2)";
          $data = $conn->prepare($query);
          $data->bindParam(':c_nombres', $this->nombres);
          $data->bindParam(':c_paterno', $this->ape_paterno);
          $data->bindParam(':c_materno', $this->ape_materno);
          $data->bindParam(':c_celular', $this->contacto_celular);
          $data->bindParam(':c_cargo', $this->contacto_cargo);
          $data->bindParam(':c_correo', $this->contacto_correo);
          $data->bindParam(':c_dni', $this->dni);

          $data->bindParam(':nom_titular', $this->nombre_titular);
          $data->bindParam(':ape_titular', $this->apellido_titular);
          $data->bindParam(':ruc', $this->ruc);
          $data->bindParam(':razon', $this->razon_social);
          $data->bindParam(':comercial', $this->nombre_comercial);
          $data->bindParam(':direccion', $this->direccion);
          $data->bindParam(':ubicacion', $this->ubicacion);
          $data->bindParam(':correo', $this->correo);
          $data->bindParam(':contra', $this->contra);
          $data->bindParam(':celular', $this->celular);
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

  function Login(){
    $existe = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "SELECT * FROM clientes
                  WHERE correo = :correo and contra = :pass";
        $data = $conn->prepare($query);
        $data->bindParam(':correo', $this->correo);
        $data->bindParam(':pass', $this->contra);
        $data->execute();
    } catch (PDOException $e) {
      die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
    }

    $row = $data->fetchAll(PDO::FETCH_ASSOC);
    $row_count = $data->rowCount();

    if ($row_count > 0) {
        $existe = true;
        foreach ($row as $fila) {
            $this->id = $fila['id'];
            $this->tipo = $fila['tipo'];
            // $this->nombres = $fila['nombres'];
            // $this->correo = $fila['correo'];
            // $this->contra = $fila['contra'];
        }
    } else {
        $existe = false;
    }
    $conn = null;
    return $existe;
}

function Profile_persona(){
  $existe = false;
  $db = new conexionDB();
  $conn = $db->getConexion();

  try {
      $query = "SELECT * FROM clientes
                WHERE id = :id";
      $data = $conn->prepare($query);
      $data->bindParam(':id', $this->id);
      $data->execute();
  } catch (PDOException $e) {
      die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
  }

  $row = $data->fetchAll(PDO::FETCH_ASSOC);
  $row_count = $data->rowCount();

  if ($row_count > 0) {
      $existe = true;
      foreach ($row as $fila) {
          $this->id = $fila['id'];
          $this->nombres = $fila['nombres'];
          $this->ape_paterno = $fila['ape_paterno'];
          $this->ape_materno = $fila['ape_materno'];
          $this->dni = $fila['dni'];
          $this->correo = $fila['correo'];
          $this->celular = $fila['celular'];
      }
  } else {
      $existe = false;
  }
  $conn = null;
  return $existe;
}

function Profile_empresa(){
  $existe = false;
  $db = new conexionDB();
  $conn = $db->getConexion();

  try {
      $query = "SELECT * FROM clientes
                WHERE id = :id";
      $data = $conn->prepare($query);
      $data->bindParam(':id', $this->id);
      $data->execute();
  } catch (PDOException $e) {
      die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
  }

  $row = $data->fetchAll(PDO::FETCH_ASSOC);
  $row_count = $data->rowCount();

  if ($row_count > 0) {
      $existe = true;
      foreach ($row as $fila) {
          $this->id = $fila['id'];

          $this->nombres = $fila['nombres'];
          $this->ape_paterno = $fila['ape_paterno'];
          $this->ape_materno = $fila['ape_materno'];
          $this->contacto_celular = $fila['contacto_celular'];
          $this->contacto_correo = $fila['contacto_correo'];
          $this->contacto_cargo = $fila['contacto_cargo'];
          $this->dni = $fila['dni'];

          $this->razon_social = $fila['razon_social'];
          $this->nombre_comercial = $fila['nombre_comercial'];
          $this->direccion = $fila['direccion'];
          $this->ubicacion = $fila['ubicacion'];
          $this->ruc = $fila['ruc'];
          $this->correo = $fila['correo'];
          $this->celular = $fila['celular'];
          $this->nombre_titular = $fila['nombre_titular'];
          $this->apellido_titular = $fila['apellido_titular'];
      }
  } else {
      $existe = false;
  }
  $conn = null;
  return $existe;
}

function Update_profile($dato){
  $verificar = false;
  $db = new conexionDB();
  $conn = $db->getConexion();

  try {
    if ($dato == 1) {
      $query = "UPDATE clientes set nombres = :nombres, ape_paterno = :a_paterno, ape_materno = :a_materno, dni = :dni,
      contacto_correo = :correo,contacto_celular = :celular,contacto_cargo = :cargo, contra = :contra_nueva WHERE id = :id ";
    } else {
      $query = "UPDATE clientes set nombres = :nombres, ape_paterno = :a_paterno, ape_materno = :a_materno, dni = :dni,
      contacto_correo = :correo,contacto_celular = :celular,contacto_cargo = :cargo WHERE id = :id ";
    }
      $data = $conn->prepare($query);
      $data->bindParam(':id', $this->id);
      $data->bindParam(':nombres', $this->nombres);
      $data->bindParam(':a_paterno', $this->ape_paterno);
      $data->bindParam(':a_materno', $this->ape_materno);
      $data->bindParam(':dni', $this->dni);
      $data->bindParam(':correo', $this->contacto_correo);
      $data->bindParam(':celular', $this->contacto_celular);
      $data->bindParam(':cargo', $this->contacto_cargo);
      if ($dato == 1) {
      $data->bindParam(':contra_nueva', $this->contra);
      }
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


function Verificar_usuario()
{
    $verificar = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "SELECT correo from clientes where correo = :correo";
        $data = $conn->prepare($query);
        $data->bindParam(':correo', $this->correo);
        $data->execute();
    } catch (PDOException $e) {
        die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
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

function Resetear_password()
{
    $verificar = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "UPDATE clientes SET contra= :nueva_pass WHERE correo = :correo";
        $data = $conn->prepare($query);
        $data->bindParam(':correo', $this->correo);
        $data->bindParam(':nueva_pass', $this->contra);
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
   * Get the value of razon_social
   */ 
  public function getRazon_social()
  {
    return $this->razon_social;
  }

  /**
   * Set the value of razon_social
   *
   * @return  self
   */ 
  public function setRazon_social($razon_social)
  {
    $this->razon_social = $razon_social;

    return $this;
  }

  /**
   * Get the value of nombre_comercial
   */ 
  public function getNombre_comercial()
  {
    return $this->nombre_comercial;
  }

  /**
   * Set the value of nombre_comercial
   *
   * @return  self
   */ 
  public function setNombre_comercial($nombre_comercial)
  {
    $this->nombre_comercial = $nombre_comercial;

    return $this;
  }

  /**
   * Get the value of nombre_titular
   */ 
  public function getNombre_titular()
  {
    return $this->nombre_titular;
  }

  /**
   * Set the value of nombre_titular
   *
   * @return  self
   */ 
  public function setNombre_titular($nombre_titular)
  {
    $this->nombre_titular = $nombre_titular;

    return $this;
  }

  /**
   * Get the value of apellido_titular
   */ 
  public function getApellido_titular()
  {
    return $this->apellido_titular;
  }

  /**
   * Set the value of apellido_titular
   *
   * @return  self
   */ 
  public function setApellido_titular($apellido_titular)
  {
    $this->apellido_titular = $apellido_titular;

    return $this;
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

    return $this;
  }

  public function getRuc()
  {
    return $this->ruc;
  }

  public function setRuc($ruc)
  {
    $this->ruc = $ruc;

    return $this;
  }

  public function getTipo()
  {
    return $this->tipo;
  }

  public function setTipo($tipo)
  {
    $this->tipo = $tipo;

    return $this;
  }

  public function getUbicacion()
  {
    return $this->ubicacion;
  }

  public function setUbicacion($ubicacion)
  {
    $this->ubicacion = $ubicacion;

    return $this;
  }

  public function getContacto()
  {
    return $this->contacto;
  }

  public function setContacto($contacto)
  {
    $this->contacto = $contacto;

    return $this;
  }

  public function getContacto_celular()
  {
    return $this->contacto_celular;
  }

  public function setContacto_celular($contacto_celular)
  {
    $this->contacto_celular = $contacto_celular;

    return $this;
  }

  public function getContacto_cargo()
  {
    return $this->contacto_cargo;
  }

  public function setContacto_cargo($contacto_cargo)
  {
    $this->contacto_cargo = $contacto_cargo;

    return $this;
  }

  public function getContacto_correo()
  {
    return $this->contacto_correo;
  }

  public function setContacto_correo($contacto_correo)
  {
    $this->contacto_correo = $contacto_correo;

    return $this;
  }
}

?>