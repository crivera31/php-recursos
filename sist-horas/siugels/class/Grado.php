<?php
require_once '../../class/conexionDB.php';
class Grado
{
    private $id;
    private $nom_grado;
    private $nom_seccion;
    private $id_nivel;
    private $id_institucion;

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
     * Get the value of nom_grado
     */
    public function getNom_grado()
    {
        return $this->nom_grado;
    }

    /**
     * Set the value of nom_grado
     *
     * @return  self
     */
    public function setNom_grado($nom_grado)
    {
        $this->nom_grado = $nom_grado;
    }

    /**
     * Get the value of nom_seccion
     */
    public function getNom_seccion()
    {
        return $this->nom_seccion;
    }

    /**
     * Set the value of nom_seccion
     *
     * @return  self
     */
    public function setNom_seccion($nom_seccion)
    {
        $this->nom_seccion = $nom_seccion;
    }

    /**
     * Get the value of id_nivel
     */
    public function getId_nivel()
    {
        return $this->id_nivel;
    }

    /**
     * Set the value of id_nivel
     *
     * @return  self
     */
    public function setId_nivel($id_nivel)
    {
        $this->id_nivel = $id_nivel;
    }

    /**
     * Get the value of id_institucion
     */
    public function getId_institucion()
    {
        return $this->id_institucion;
    }

    /**
     * Set the value of id_institucion
     *
     * @return  self
     */
    public function setId_institucion($id_institucion)
    {
        $this->id_institucion = $id_institucion;
    }

    function Add_grado_por_institucion()
    {
      $grabado = false;
      $db = new conexionDB();
      $conn = $db->getConexion();
  
      try {
        $query = "INSERT INTO grados(nombre, nom_seccion, idNivel, IdInstitucion) 
                VALUES( :nombre, :seccion, :id_nivel, :id_institucion)";
        $data = $conn->prepare($query);
        $data->bindParam(':nombre', $this->nom_grado);
        $data->bindParam(':seccion', $this->nom_seccion);
        $data->bindParam(':id_nivel', $this->id_nivel);
        $data->bindParam(':id_institucion', $this->id_institucion);
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

    function View_grado_por_institucion()
    {
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT g.IdGrado as id, n.nombre as nivel, g.nombre as grado, g.nom_seccion as seccion
                FROM grados g
                inner JOIN niveles n ON g.IdNivel = n.IdNivel
                WHERE g.IdInstitucion = :id_institucion ";
            $data = $conn->prepare($query);
            $data->bindParam(':id_institucion', $this->id_institucion);
            $data->execute();
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);
        
        $conn = null;
        return $fila;
    }

    function Add_grado_a_docentes($id)
    {
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT DISTINCT nombre
                    from grados
                    WHERE IdInstitucion = (SELECT inst.IdInstitucion from instituciones inst where inst.IdDirector = $id ) 
                    GROUP BY nombre";
            $data = $conn->query($query);
            $data->execute();
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);
        
        $conn = null;
        return $fila;

    }

    function View_nomSeccion_x_grado($id)
    {
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT DISTINCT IdGrado, nom_seccion
                    from grados
                    WHERE IdInstitucion = (SELECT inst.IdInstitucion from instituciones inst where inst.IdDirector = $id ) and nombre = :n_seccion ";
            $data = $conn->prepare($query);
            $data->bindParam(':n_seccion', $this->nom_seccion);
            $data->execute();
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);
        
        $conn = null;
        return $fila;
    }

    function Validar_grados()
  {
    $existe = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
      $query = "SELECT nombre, nom_seccion
                from grados 
                WHERE (nombre = :nombre and nom_seccion = :n_seccion) and IdInstitucion = :institucionID";
      $data = $conn->prepare($query);
      $data->bindParam(':nombre', $this->nom_grado);
      $data->bindParam(':n_seccion', $this->nom_seccion);
      $data->bindParam(':institucionID', $this->id_institucion);
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