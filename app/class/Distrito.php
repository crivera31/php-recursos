<?php
class Distrito{
  private $id;
  private $id_provin;
  private $nombre;

  private $departamento;
  private $provincia;
  private $distrito;
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
      die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);

    $conn = null;
    return $fila;
  }

  function mostrar_ubicacion(){
    $existe = false;
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
      die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
        $row_count = $data->rowCount();

        if ($row_count >0) {
            $existe = true;
            foreach($fila as $row){
                $this->departamento = $row ['departamento'];
                $this->provincia = $row ['provincia'];
                $this->distrito = $row['distrito'];
            }
        } else {
            $existe = false;
        }

        $conn = null;
        return $existe;
  }

  /**
   * Get the value of departamento
   */ 
  public function getDepartamento()
  {
    return $this->departamento;
  }

  /**
   * Set the value of departamento
   *
   * @return  self
   */ 
  public function setDepartamento($departamento)
  {
    $this->departamento = $departamento;

    return $this;
  }

  /**
   * Get the value of provincia
   */ 
  public function getProvincia()
  {
    return $this->provincia;
  }

  /**
   * Set the value of provincia
   *
   * @return  self
   */ 
  public function setProvincia($provincia)
  {
    $this->provincia = $provincia;

    return $this;
  }

  /**
   * Get the value of distrito
   */ 
  public function getDistrito()
  {
    return $this->distrito;
  }

  /**
   * Set the value of distrito
   *
   * @return  self
   */ 
  public function setDistrito($distrito)
  {
    $this->distrito = $distrito;

    return $this;
  }
}
?>