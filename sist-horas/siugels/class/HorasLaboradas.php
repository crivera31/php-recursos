<?php
require_once '../../class/conexionDB.php';
class HorasLaboradas{
  private $id;
  private $horas;
  private $fecha;
  private $docenteID;
  private $observacion;

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
   * Get the value of horas
   */ 
  public function getHoras()
  {
    return $this->horas;
  }

  /**
   * Set the value of horas
   *
   * @return  self
   */ 
  public function setHoras($horas)
  {
    $this->horas = $horas;
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
   * Get the value of docenteID
   */ 
  public function getDocenteID()
  {
    return $this->docenteID;
  }

  /**
   * Set the value of docenteID
   *
   * @return  self
   */ 
  public function setDocenteID($docenteID)
  {
    $this->docenteID = $docenteID;
  }

    /**
   * Get the value of observacion
   */ 
  public function getObservacion()
  {
    return $this->observacion;
  }

  /**
   * Set the value of observacion
   *
   * @return  self
   */ 
  public function setObservacion($observacion)
  {
    $this->observacion = $observacion;
  }

  function Add_horas_laboradas()
  {
    $grabado = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "INSERT INTO hrs_laboradas(horas, fecha, IdDocente, observaciones) 
              VALUES( :horas, :fecha, :id_docente, :observacion)";
      $data = $conn->prepare($query);
      $data->bindParam(':horas', $this->horas);
      $data->bindParam(':fecha', $this->fecha);
      $data->bindParam(':id_docente', $this->docenteID);
      $data->bindParam(':observacion', $this->observacion);
      $data->execute();
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    if (!$data) {
      $grabado = false;
    } else {
      $grabado = true;
    }

    $conn = null;
    return $grabado;
  }

  function Validar_horas()
  {
    $existe = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "SELECT fecha from hrs_laboradas 
              WHERE fecha = :fecha_hora and IdDocente = :id_docente";
      $data = $conn->prepare($query);
      $data->bindParam(':fecha_hora', $this->fecha);
      $data->bindParam(':id_docente', $this->docenteID);
      $data->execute();
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $row_count = $data->rowCount();

    if ($row_count > 0) {
      $existe = true; //si encuentra 1
    } else {
      $existe = false;
    }

    $conn = null;
    return $existe;
  }

}
?>