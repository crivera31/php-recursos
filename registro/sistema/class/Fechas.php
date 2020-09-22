<?php
require_once '../../class/conexionDB.php';
class Fecha{
  private $id;
  private $fecha_ini;
  private $fecha_fin;
  private $practicante_id;
  

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
   * Get the value of fecha_ini
   */ 
  public function getFecha_ini()
  {
    return $this->fecha_ini;
  }

  /**
   * Set the value of fecha_ini
   *
   * @return  self
   */ 
  public function setFecha_ini($fecha_ini)
  {
    $this->fecha_ini = $fecha_ini;
  }

  /**
   * Get the value of fecha_fin
   */ 
  public function getFecha_fin()
  {
    return $this->fecha_fin;
  }

  /**
   * Set the value of fecha_fin
   *
   * @return  self
   */ 
  public function setFecha_fin($fecha_fin)
  {
    $this->fecha_fin = $fecha_fin;
  }

  /**
   * Get the value of practicante_id
   */ 
  public function getPracticante_id()
  {
    return $this->practicante_id;
  }

  /**
   * Set the value of practicante_id
   *
   * @return  self
   */ 
  public function setPracticante_id($practicante_id)
  {
    $this->practicante_id = $practicante_id;
  }

  function Add_fechas()
  {
    $grabado = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "INSERT INTO inicio_practicas(fecha_ini, fecha_fin, id_practicante)
      VALUES( :inicio, :final, :practicante_id)";
      $data = $conn->prepare($query);
      $data->bindParam(':inicio', $this->fecha_ini);
      $data->bindParam(':final', $this->fecha_fin);
      $data->bindParam(':practicante_id', $this->practicante_id);
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

  function Mostrar_fechas()
  {
    $grabado = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "SELECT p.nombre, p.apaterno, p.amaterno, ini.fecha_ini, ini.fecha_fin,
                if (CURDATE() > fecha_fin,'retirado','activo') as estado
                FROM practicante p
                INNER JOIN inicio_practicas ini
                on p.id = ini.id_practicante
                order by p.apaterno ASC";
      $data = $conn->query($query);
      $data->execute();
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    
    $conn = null; 
    return $fila;
  }

  function Validar_fecha()
  {
    $existe = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "SELECT *
              FROM inicio_practicas
              WHERE id_practicante = :id_practicante ";
      $data = $conn->prepare($query);
      $data->bindParam(':id_practicante', $this->practicante_id);
      $data->execute();
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $row_count = $data->rowCount();

    if ($row_count > 0) {
      $existe = true;
    } else {
      $existe = false;
    }

    $conn = null;
    return $existe;
  }
}
?>