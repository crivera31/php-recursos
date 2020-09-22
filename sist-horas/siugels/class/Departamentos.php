<?php
require_once '../../class/conexionDB.php';
class Departamento{
  private $id;
  private $nombre;

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

  function View_departamentos()
  {
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "SELECT * FROM departamentos ORDER BY nombre";
      $data = $conn->query($query);
      $data->execute();
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    
    $conn = null; 
    return $fila;
  }
}
?>