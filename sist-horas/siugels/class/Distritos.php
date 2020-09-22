<?php
require_once '../../class/conexionDB.php';
class Distrito{
  private $id;
  private $id_provin;
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
   * Get the value of id_provin
   */ 
  public function getId_provin()
  {
    return $this->id_provin;
  }

  /**
   * Set the value of id_provin
   *
   * @return  self
   */ 
  public function setId_provin($id_provin)
  {
    $this->id_provin = $id_provin;
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

  function View_distritos(){
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "SELECT d.IdDistrito, d.nombre
                from distritos d
                inner JOIN provincias p 
                on d.IdProvincia = p.IdProvincia
                WHERE d.IdProvincia = :id_provincia
                ORDER BY d.nombre ASC ";
      $data = $conn->prepare($query);
      $data->bindParam(':id_provincia', $this->id_provin);
      $data->execute();
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);

    $conn = null;    
    return $fila;
  }

  function Mostrar_dep_pro_dis(){
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "SELECT de.nombre as departamento, pro.nombre provincia, dis.nombre as distrito
                from departamentos de
                inner JOIN provincias pro
                  on pro.IdDepartamento = de.IdDepartamento
                inner join distritos dis
                  on dis.IdProvincia = pro.IdProvincia
                where dis.IdDistrito = :id_distrito";
      $data = $conn->prepare($query);
      $data->bindParam(':id_distrito', $this->id);
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