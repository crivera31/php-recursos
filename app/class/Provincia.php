<?php
class Provincia{
  private $id;
  private $id_depar;
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
   * Get the value of id_depar
   */ 
  public function getId_depar()
  {
    return $this->id_depar;
  }

  /**
   * Set the value of id_depar
   *
   * @return  self
   */ 
  public function setId_depar($id_depar)
  {
    $this->id_depar = $id_depar;
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

  function View_provincias(){
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "SELECT p.IdProvincia, p.nombre
                from provincias p
                inner JOIN departamentos d 
                on p.IdDepartamento = d.IdDepartamento
                WHERE p.IdDepartamento = :id_departamento
                ORDER BY p.nombre ASC";
      $data = $conn->prepare($query);
      $data->bindParam(':id_departamento', $this->id_depar);
      $data->execute();
    } catch (PDOException $e) {
      die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);

    $conn = null;    
    return $fila;
  }
}
?>