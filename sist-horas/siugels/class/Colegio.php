<?php
require_once '../../class/conexionDB.php';
class Colegio{

  private $id;
  private $nombre;
  private $direccion;
  private $referencia;
  private $niveles;
  private $telefono;
  private $distritoID;
  private $directorID;
  private $departmento;
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
   * Get the value of referencia
   */ 
  public function getReferencia()
  {
    return $this->referencia;
  }

  /**
   * Set the value of referencia
   *
   * @return  self
   */ 
  public function setReferencia($referencia)
  {
    $this->referencia = $referencia;
  }

  /**
   * Get the value of niveles
   */ 
  public function getNiveles()
  {
    return $this->niveles;
  }

  /**
   * Set the value of niveles
   *
   * @return  self
   */ 
  public function setNiveles($niveles)
  {
    $this->niveles = $niveles;
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
   * Get the value of distritoID
   */ 
  public function getDistritoID()
  {
    return $this->distritoID;
  }

  /**
   * Set the value of distritoID
   *
   * @return  self
   */ 
  public function setDistritoID($distritoID)
  {
    $this->distritoID = $distritoID;
  }

  /**
   * Get the value of directorID
   */ 
  public function getDirectorID()
  {
    return $this->directorID;
  }

  /**
   * Set the value of directorID
   *
   * @return  self
   */ 
  public function setDirectorID($directorID)
  {
    $this->directorID = $directorID;
  }

    /**
   * Get the value of departmento
   */ 
  public function getDepartmento()
  {
    return $this->departmento;
  }

  /**
   * Set the value of departmento
   *
   * @return  self
   */ 
  public function setDepartmento($departmento)
  {
    $this->departmento = $departmento;
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
  }

  function Add_institucion()
  {
    $grabado = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "INSERT INTO instituciones(nombre, direccion, referencia, niveles, telefono, IdDistrito, IdDirector) 
              VALUES( :nombre, :direccion, :referencia, :niveles, :telefono, :id_distrito, :id_director)";
      $data = $conn->prepare($query);
      $data->bindParam(':nombre', $this->nombre);
      $data->bindParam(':direccion', $this->direccion);
      $data->bindParam(':referencia', $this->referencia);
      $data->bindParam(':niveles', $this->niveles);
      $data->bindParam(':telefono', $this->telefono);
      $data->bindParam(':id_distrito', $this->distritoID);
      $data->bindParam(':id_director', $this->directorID);
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

  function View_institucion()
  {
    $existe = false;
    $db = new conexionDB();
    $conn = $db->getConexion();
    
    try {
      $query = "SELECT IdInstitucion, nombre, direccion, niveles, IdDistrito
               FROM instituciones
               WHERE IdDirector = :id_director ";
      $data = $conn->prepare($query);
      $data->bindParam(':id_director', $this->directorID);
      $data->execute();
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $fila;
  }

  function View_nivel_x_institucion()
  {
    $existe = false;
    $db = new conexionDB();
    $conn = $db->getConexion();
    
    try {
      $query = "SELECT niveles
               FROM instituciones
               WHERE IdDirector = :id_director ";
      $data = $conn->prepare($query);
      $data->bindParam(':id_director', $this->directorID);
      $data->execute();
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    $row_count = $data->rowCount();

    if ($row_count > 0) {
      $existe = true;
      foreach ($fila as $row) {
        $this->niveles = $row['niveles'];
      }
    } else {
      $existe = false;
    }

    $conn = null;
    return $existe;
  }

  function Validar_una_inst_x_director()
  {
    $existe = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "SELECT *
              FROM instituciones
              WHERE IdDirector = :id_director ";
      $data = $conn->prepare($query);
      $data->bindParam(':id_director', $this->directorID);
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

  function View_info_inst()
  {
    $existe = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "SELECT inst.IdInstitucion,  inst.nombre, inst.direccion, inst.referencia, inst.niveles,inst.telefono,  de.nombre as departamento, pro.nombre as provincia, dis.nombre as distrito
      FROM instituciones inst, departamentos de
      inner JOIN provincias pro
       on pro.IdDepartamento = de.IdDepartamento
       inner join distritos dis
       ON dis.IdProvincia = pro.IdProvincia
       where inst.IdInstitucion = :id_institucion and dis.IdDistrito = :id_distrito ";
      $data = $conn->prepare($query);
      $data->bindParam(':id_institucion', $this->id);
      $data->bindParam(':id_distrito', $this->distritoID);
      $data->execute();
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    // print_r($fila);exit;
    $row_count = $data->rowCount();

    if ($row_count >0) {
        $existe = true;
        foreach($fila as $row){
            $this->id = $row ['IdInstitucion'];
            $this->nombre = $row['nombre'];
            $this->direccion = $row['direccion'];
            $this->referencia = $row['referencia'];
            $this->niveles = $row['niveles'];
            $this->telefono = $row['telefono'];
            $this->departmento = $row['departamento'];
            $this->provincia = $row['provincia'];
            $this->distrito = $row['distrito'];
        }
    } else {
        $existe = false;
    }

    $conn = null;
    return $existe;
  }

  #para el admin
  function View_all_instituciones()
  {
    $db = new conexionDB();
    $conn = $db->getConexion();
    
    try {
      // $query = "SELECT IdInstitucion, nombre, direccion, niveles
      $query = "SELECT IdInstitucion, nombre, direccion, niveles
               FROM instituciones";
      $data = $conn->query($query);
      $data->execute();
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $fila;
  }

  function Update_info()
  { 
    $verificar = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "UPDATE instituciones SET nombre = :nom, direccion = :direc, referencia = :ref, telefono = :telf  where IdInstitucion = :id_cole"; 
        $data = $conn->prepare($query);
        $data->bindParam(':id_cole', $this->id);
        $data->bindParam(':nom', $this->nombre);
        $data->bindParam(':direc', $this->direccion);
        $data->bindParam(':ref', $this->referencia);
        $data->bindParam(':telf', $this->telefono);
        $data->execute();
        } catch(PDOException $e){   
            echo "¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine();  
        }

        if ($data) {
            $verificar = true;
        } else {
            $verificar = true;
        }
    
    $conn = null;
    return $verificar;
  }

}
?>