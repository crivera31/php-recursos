<?php
require_once '../class/conexionDB.php';
class Nivel{
    private $id;
    private $nombre;
    private $codmodular;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setCodmodular($codmodular)
    {
        $this->codmodular = $codmodular;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    
    public function getCodmodular()
    {
        return $this->codmodular;
    }

    function View_niveles(){
      $db = new conexionDB();
      $conn = $db->getConexion();

      try {
          $query = "SELECT * FROM niveles";
          $data = $conn->query($query);
          $data->execute();
      } catch(PDOException $e){   
          echo "¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine();  
      }
      
      $fila = $data->fetchAll(PDO::FETCH_ASSOC);

      $conn = null;
      return $fila;
  }
}
?>