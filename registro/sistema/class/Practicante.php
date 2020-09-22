<?php
require_once '../../class/conexionDB.php';
class Practicante{
  private $id;
  private $nombre;
  private $apaterno;
  private $amaterno;
  private $dni;
  private $direccion;
  private $ubicacion;
  private $correo;
  private $telefono;
  private $descrip_pedido;
  private $documento_adjuntados;
  private $fecha;

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
   * Get the value of nombre
   */ 
  public function getNombre()
  {
    return $this->nombre;
  }

  /**
   * Set the value of nombre
   *
   * @return  self
   */ 
  public function setNombre($nombre)
  {
    $this->nombre = $nombre;
  }

  /**
   * Get the value of apaterno
   */ 
  public function getApaterno()
  {
    return $this->apaterno;
  }

  /**
   * Set the value of apaterno
   *
   * @return  self
   */ 
  public function setApaterno($apaterno)
  {
    $this->apaterno = $apaterno;
  }

  /**
   * Get the value of amaterno
   */ 
  public function getAmaterno()
  {
    return $this->amaterno;
  }

  /**
   * Set the value of amaterno
   *
   * @return  self
   */ 
  public function setAmaterno($amaterno)
  {
    $this->amaterno = $amaterno;
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
   * Get the value of telefono
   */ 
  public function getTelefono()
  {
    return $this->telefono;
  }

  /**
   * Set the value of telefono
   *
   * @return  self
   */ 
  public function setTelefono($telefono)
  {
    $this->telefono = $telefono;
  }

  /**
   * Get the value of descrip_pedido
   */ 
  public function getDescrip_pedido()
  {
    return $this->descrip_pedido;
  }

  /**
   * Set the value of descrip_pedido
   *
   * @return  self
   */ 
  public function setDescrip_pedido($descrip_pedido)
  {
    $this->descrip_pedido = $descrip_pedido;
  }

  /**
   * Get the value of documento_adjuntados
   */ 
  public function getDocumento_adjuntados()
  {
    return $this->documento_adjuntados;
  }

  /**
   * Set the value of documento_adjuntados
   *
   * @return  self
   */ 
  public function setDocumento_adjuntados($documento_adjuntados)
  {
    $this->documento_adjuntados = $documento_adjuntados;
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

  function Add_practicante()
  {
    $grabado = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "INSERT INTO practicante(nombre, apaterno, amaterno, dni, direccion, ubicacion, correo, telefono, descrip_pedido,documentos_adjuntar, fecha)
      VALUES( :nombre, :ap_paterno, :ap_materno, :dni, :direccion, :ubicacion, :correo, :telefono, :pedido, :adjuntos, :fecha)";
      $data = $conn->prepare($query);
      $data->bindParam(':nombre', $this->nombre);
      $data->bindParam(':ap_paterno', $this->apaterno);
      $data->bindParam(':ap_materno', $this->amaterno);
      $data->bindParam(':dni', $this->dni);
      $data->bindParam(':direccion', $this->direccion);
      $data->bindParam(':ubicacion', $this->ubicacion);
      $data->bindParam(':correo', $this->correo);
      $data->bindParam(':telefono', $this->telefono);
      $data->bindParam(':pedido', $this->descrip_pedido);
      $data->bindParam(':adjuntos', $this->documento_adjuntados);
      $data->bindParam(':fecha', $this->fecha);
      $data->execute();
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    if (!$data) {
      // echo 'dato no ingresado';
      $grabado = false;
    } else {
      // echo 'dato ingresado';
      $grabado = true;
    }

    $conn = null;
    return $grabado;
  }

  function Listado_Practicantes()
  {
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "SELECT id, nombre, apaterno, amaterno FROM practicante ORDER BY apaterno asc";
      $data = $conn->query($query);
      $data->execute();
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    
    $conn = null; 
    return $fila;
  }

  function Info_practicante()
  {
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "SELECT * FROM practicante WHERE id = :practicante_id";
      $data = $conn->prepare($query);
      $data->bindParam(':practicante_id', $this->id);
      $data->execute();
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    
    $conn = null; 
    return $fila;
  }

  function Nombres()
  {
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "SELECT id, nombre FROM practicante order by nombre asc";
      $data = $conn->query($query);
      $data->execute();
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    
    $conn = null; 
    return $fila;
  }

  function Apellidos()
  {
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "SELECT apaterno, amaterno FROM practicante WHERE id = :practicante_id ";
      $data = $conn->prepare($query);
      $data->bindParam(':practicante_id', $this->id);
      $data->execute();
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    
    $conn = null; 
    return $fila;
  }

}
