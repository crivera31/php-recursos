<?php
require_once '../../class/conexionDB.php';
class Docente{
  private $id;
  private $nombre;
  private $a_paterno;
  private $a_materno;
  private $dni;
  // private $celular;
  private $jor_laboral;
  private $hrs_programada;
  private $institucion_id;
  private $director_id;
  private $nombre_grado;
  private $nombre_seccion;
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
   * Get the value of a_paterno
   */ 
  public function getA_paterno()
  {
    return $this->a_paterno;
  }

  /**
   * Set the value of a_paterno
   *
   * @return  self
   */ 
  public function setA_paterno($a_paterno)
  {
    $this->a_paterno = $a_paterno;
  }

  /**
   * Get the value of a_materno
   */ 
  public function getA_materno()
  {
    return $this->a_materno;
  }

  /**
   * Set the value of a_materno
   *
   * @return  self
   */ 
  public function setA_materno($a_materno)
  {
    $this->a_materno = $a_materno;
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
   * Get the value of celular
   */ 
  // public function getCelular()
  // {
  //   return $this->celular;
  // }

  /**
   * Set the value of celular
   *
   * @return  self
    */ 
  // public function setCelular($celular)
  // {
  //   $this->celular = $celular;
  // }

  /**
   * Get the value of jor_laboral
   */ 
  public function getJor_laboral()
  {
    return $this->jor_laboral;
  }

  /**
   * Set the value of jor_laboral
   *
   * @return  self
   */ 
  public function setJor_laboral($jor_laboral)
  {
    $this->jor_laboral = $jor_laboral;
  }

  /**
   * Get the value of hrs_programada
   */ 
  public function getHrs_programada()
  {
    return $this->hrs_programada;
  }

  /**
   * Set the value of hrs_programada
   *
   * @return  self
   */ 
  public function setHrs_programada($hrs_programada)
  {
    $this->hrs_programada = $hrs_programada;
  }

  /**
   * Get the value of institucion_id
   */ 
  public function getInstitucion_id()
  {
    return $this->institucion_id;
  }

  /**
   * Set the value of institucion_id
   *
   * @return  self
   */ 
  public function setInstitucion_id($institucion_id)
  {
    $this->institucion_id = $institucion_id;
  }
    /**
   * Get the value of director_id
   */ 
  public function getDirector_id()
  {
    return $this->director_id;
  }

  /**
   * Set the value of director_id
   *
   * @return  self
   */ 
  public function setDirector_id($director_id)
  {
    $this->director_id = $director_id;
  }

  /**
   * Get the value of nombre_grado
   */ 
  public function getNombre_grado()
  {
    return $this->nombre_grado;
  }

  /**
   * Set the value of nombre_grado
   *
   * @return  self
   */ 
  public function setNombre_grado($nombre_grado)
  {
    $this->nombre_grado = $nombre_grado;
  }

    /**
   * Get the value of nombre_seccion
   */ 
  public function getNombre_seccion()
  {
    return $this->nombre_seccion;
  }

  /**
   * Set the value of nombre_seccion
   *
   * @return  self
   */ 
  public function setNombre_seccion($nombre_seccion)
  {
    $this->nombre_seccion = $nombre_seccion;
  }


  function Add_docente()
  {
    $grabado = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "INSERT INTO docentes(nombre, ape_paterno, ape_materno, dni, jornada_laboral, hrs_programadas, IdInstitucion, nombre_grado,nombre_seccion, fecha_re, fecha_sa, estado)
      VALUES( :nombre, :ap_paterno, :ap_materno, :dni, :jornada_laboral, :horas_programadas, 
      (SELECT inst.IdInstitucion
      from instituciones inst 
      where inst.IdDirector = :id_director), :nombre_grado, :nombre_seccion, CURRENT_DATE(), CURRENT_DATE(), 1)";
      $data = $conn->prepare($query);
      $data->bindParam(':nombre', $this->nombre);
      $data->bindParam(':ap_paterno', $this->a_paterno);
      $data->bindParam(':ap_materno', $this->a_materno);
      $data->bindParam(':dni', $this->dni);
      $data->bindParam(':jornada_laboral', $this->jor_laboral);
      $data->bindParam(':horas_programadas', $this->hrs_programada);
      $data->bindParam(':id_director', $this->director_id);
      $data->bindParam(':nombre_grado', $this->nombre_grado);
      $data->bindParam(':nombre_seccion', $this->nombre_seccion);
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

  function View_docentes_x_inst()
  {
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "SELECT IdDocente, nombre, ape_paterno, ape_materno, dni
                FROM docentes do
                WHERE do.IdInstitucion = (SELECT inst.IdInstitucion 
                                          from instituciones inst where inst.IdDirector = :id_director) and estado = 1
                order by ape_paterno asc";
        $data = $conn->prepare($query);
        $data->bindParam(':id_director', $this->director_id);
        $data->execute();
    } catch (PDOException $e) {
        echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    
    $conn = null;
    return $fila;
  }

  function View_info_docente()
  {
    $existe = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "SELECT *
              FROM docentes
              WHERE IdDocente = :id_docente ";
      $data = $conn->prepare($query);
      $data->bindParam(':id_docente', $this->id);
      $data->execute();
    } catch (PDOException $e) {
      echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    $conn = null;
    return $fila;
  }

  function Validar_grado_seccion()
  {
    $existe = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "SELECT *
              FROM docentes
              WHERE nombre_grado = :nom_grado and nombre_seccion = :nom_seccion and IdInstitucion = (SELECT inst.IdInstitucion from instituciones inst where inst.IdDirector = :id_director)";
      $data = $conn->prepare($query);
      $data->bindParam(':nom_grado', $this->nombre_grado);
      $data->bindParam(':nom_seccion', $this->nombre_seccion);
      $data->bindParam(':id_director', $this->director_id);
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

  #para el admin
  function View_all_docentes()
  {
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "SELECT IdDocente, nombre, ape_paterno, ape_materno FROM docentes 
                WHERE IdInstitucion = :id_institucion 
                order by IdDocente asc";
        $data = $conn->prepare($query);
        $data->bindParam(':id_institucion', $this->institucion_id);
        $data->execute();
    } catch (PDOException $e) {
        echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    
    $conn = null;
    return $fila;
  }

  function Delete_docente(){ 
    $verificar = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "UPDATE docentes SET estado = 0, fecha_sa = CURRENT_DATE()  where IdDocente = :id_docente"; 
        $data = $conn->prepare($query);
        $data->bindParam(':id_docente', $this->id);
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

  function Update_info()
  { 
    $verificar = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "UPDATE docentes SET nombre = :nom, ape_paterno = :paterno, ape_materno = :materno, dni = :dni, jornada_laboral = :jornada,
        hrs_programadas = :hrs, nombre_grado = :grado, nombre_seccion = :seccion
        where IdDocente = :id_docente"; 
        $data = $conn->prepare($query);
        $data->bindParam(':id_docente', $this->id);
        $data->bindParam(':nom', $this->nombre);
        $data->bindParam(':paterno', $this->a_paterno);
        $data->bindParam(':materno', $this->a_materno);
        $data->bindParam(':dni', $this->dni);
        $data->bindParam(':jornada', $this->jor_laboral);
        $data->bindParam(':hrs', $this->hrs_programada);
        $data->bindParam(':grado', $this->nombre_grado);
        $data->bindParam(':seccion', $this->nombre_seccion);
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