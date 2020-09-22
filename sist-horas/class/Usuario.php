<?php
require_once 'conexionDB.php';

class Usuario{
    
    private $id;    
    private $nombres;
    private $ape_paterno;
    private $ape_materno;
    private $correo;
    private $username;
    private $password;
    private $starsession;
    private $lastsession;
    private $IdRol;

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
     * Set the value of nombres
     *
     * @return  self
     */ 
    public function setNombres($nombres)
    {
        $this->nombres = $nombres;
    }

    /**
     * Set the value of ape_paterno
     *
     * @return  self
     */ 
    public function setApe_paterno($ape_paterno)
    {
        $this->ape_paterno = $ape_paterno;
    }

    /**
     * Set the value of ape_materno
     *
     * @return  self
     */ 
    public function setApe_materno($ape_materno)
    {
        $this->ape_materno = $ape_materno;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Set the value of starsession
     *
     * @return  self
     */ 
    public function setStarsession($starsession)
    {
        $this->starsession = $starsession;
    }

    /**
     * Set the value of lastsession
     *
     * @return  self
     */ 
    public function setLastsession($lastsession)
    {
        $this->lastsession = $lastsession;
    }

    /**
     * Set the value of IdRol
     *
     * @return  self
     */ 
    public function setIdRol($IdRol)
    {
        $this->IdRol = $IdRol;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of nombres
     */ 
    public function getNombres()
    {
        return $this->nombres;
    }

    /**
     * Get the value of ape_paterno
     */ 
    public function getApe_paterno()
    {
        return $this->ape_paterno;
    }

    /**
     * Get the value of ape_materno
     */ 
    public function getApe_materno()
    {
        return $this->ape_materno;
    }

    /**
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of starsession
     */ 
    public function getStarsession()
    {
        return $this->starsession;
    }

    /**
     * Get the value of lastsession
     */ 
    public function getLastsession()
    {
        return $this->lastsession;
    }

    /**
     * Get the value of IdRol
     */ 
    public function getIdRol()
    {
        return $this->IdRol;
    }

    function Login(){
        $existe = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT * FROM directores WHERE username = :user and pass = :psw ";
            $data = $conn->prepare($query);
            $data->bindParam(':user', $this->username);
            $data->bindParam(':psw', $this->password);
            $data->execute();
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
        }

        $row = $data->fetchAll(PDO::FETCH_ASSOC);
        $row_count = $data->rowCount();

        if ($row_count > 0) {
            $existe = true;
            foreach ($row as $fila) {
                $this->id = $fila['IdDirector'];
                $this->username = $fila['username'];
                $this->IdRol = $fila['IdRol'];
            }
        } else {
            $existe = false;
        }

        $conn = null;
        return $existe;
    }

    function View_profile(){
        $existe = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT * FROM directores where IdDirector = :directorID ";
            $data = $conn->prepare($query);
            $data->bindParam(':directorID', $this->id);
            $data->execute();
        } catch(PDOException $e){   
            echo "¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine();  
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);
        // print_r($fila);exit;
        $row_count = $data->rowCount();

        if ($row_count >0) {
            $existe = true;
            foreach($fila as $row){
                $this->id = $row ['IdDirector'];
                $this->nombres = $row['nombre'];
                $this->ape_paterno = $row['ape_paterno'];
                $this->ape_materno = $row['ape_materno'];
                $this->correo = $row['correo'];
                $this->username = $row['username'];
                // $this->IdRol = $row['IdRol'];
            }
        } else {
            $existe = false;
        }

        $conn = null;
        return $existe;
    }

    function Update_profile(){
        $verificar = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "UPDATE directores set nombre = :nombres, ape_paterno = :a_paterno, ape_materno = :a_materno, correo = :correo,
            username = :user WHERE IdDirector = :directorID ";
            $data = $conn->prepare($query);
            $data->bindParam(':nombres', $this->nombres);
            $data->bindParam(':a_paterno', $this->ape_paterno);
            $data->bindParam(':a_materno', $this->ape_materno);
            $data->bindParam(':correo', $this->correo);
            $data->bindParam(':user', $this->username);
            $data->bindParam(':directorID', $this->id);
            $data->execute();
        } catch(PDOException $e){   
            echo "¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine();  
        }
        
        $row_count = $data->rowCount();
        if ($row_count > 0) {
            $verificar = true;
        } else {
            $verificar = false;
        }

        $conn = null;
        return $verificar;
    }

    function Count_directores()
    {
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT count(*) FROM directores d 
            WHERE  d.IdDirector != 1 and d.nombre != ' ' and d.ape_paterno != ' ' and d.ape_materno != ' ' ";
            $data = $conn->query($query);
            $data->execute();
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
        }

        $row_count = $data->fetchColumn();

        $conn = null;
        return $row_count;
    }

    function Count_docentes()
    {
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT count(*) FROM docentes  where estado != 0";
            $data = $conn->query($query);
            $data->execute();
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
        }

        $row_count = $data->fetchColumn();

        $conn = null;
        return $row_count;
    }

    function Count_colegios()
    {
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT count(*) FROM instituciones";
            $data = $conn->query($query);
            $data->execute();
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
        }

        $row_count = $data->fetchColumn();

        $conn = null;
        return $row_count;
    }

    function Cambiar_password()
    {
        $verificar = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "UPDATE directores SET pass= :nueva_pass WHERE IdDirector = :directorID";
            $data = $conn->prepare($query);
            $data->bindParam(':nueva_pass', $this->password);
            $data->bindParam(':directorID', $this->id);
            $data->execute();
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
        }

        if ($data) {
            $verificar = true;
        } else {
            $verificar = false;
        }

        $conn = null;
        return $verificar;
    }

    function Verificar_usuario()
    {
        $verificar = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT username from directores where username = :user";
            $data = $conn->prepare($query);
            $data->bindParam(':user', $this->username);
            $data->execute();
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
        }

        $row_count = $data->rowCount();
        if ($row_count > 0) {
            $verificar = true;
        } else {
            $verificar = false;
        }

        $conn = null;
        return $verificar;
    }

    function Resetear_password()
    {
        $verificar = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "UPDATE directores SET pass= :nueva_pass WHERE username = :usuario";
            $data = $conn->prepare($query);
            $data->bindParam(':usuario', $this->username);
            $data->bindParam(':nueva_pass', $this->password);
            $data->execute();
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
        }

        if ($data) {
            $verificar = true;
        } else {
            $verificar = false;
        }

        $conn = null;
        return $verificar;
    }

    function Validar_user()
    {
      $existe = false;
      $db = new conexionDB();
      $conn = $db->getConexion();
  
      try {
        $query = "SELECT *
                FROM directores
                WHERE username = :user ";
        $data = $conn->prepare($query);
        $data->bindParam(':user', $this->username);
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

    function Add_user($rol)
    {
        $verificar = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "INSERT INTO directores(username, pass,IdRol) VALUES(:usuario, :pass, $rol)";
            $data = $conn->prepare($query);
            $data->bindParam(':usuario', $this->username);
            $data->bindParam(':pass', $this->password);
            $data->execute();
        } catch (PDOException $e) {
            echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
        }

        if ($data) {
            $verificar = true;
        } else {
            $verificar = false;
        }

        $conn = null;
        return $verificar;
    }

    function View_all_users()
    {
      $db = new conexionDB();
      $conn = $db->getConexion();
  
      try {
        $query = "SELECT IdDirector, nombre, ape_paterno, ape_materno, username FROM directores 
                WHERE IdDirector != 1 
                ORDER BY IdDirector asc";
        // $query = "SELECT dir.IdDirector, dir.nombre, dir.ape_paterno, dir.ape_materno, dir.username, 
        //         inst.nombre as n_colegio 
        //         FROM instituciones inst
        //         INNER JOIN directores dir
        //         on inst.IdDirector = dir.IdDirector
        //         WHERE dir.IdDirector != 1 
        //         ORDER BY dir.IdDirector asc";
        $data = $conn->query($query);
        $data->execute();
      } catch (PDOException $e) {
        echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
      }
  
      $fila = $data->fetchAll(PDO::FETCH_ASSOC);
      
      $conn = null; 
      return $fila;
    }

    function Update_user(){
        $verificar = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "UPDATE directores set username = :user WHERE IdDirector = :directorID ";
            $data = $conn->prepare($query);
            $data->bindParam(':directorID', $this->id);
            $data->bindParam(':user', $this->username);
            $data->execute();
        } catch(PDOException $e){   
            echo "¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine();  
        }
        
        if ($data) {
            $verificar = true;
        } else {
            $verificar = false;
        }

        $conn = null;
        return $verificar;
    }

    function Delete_user(){
        $verificar = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "DELETE FROM directores WHERE IdDirector = :directorID ";
            $data = $conn->prepare($query);
            $data->bindParam(':directorID', $this->id);
            $data->execute();
        } catch(PDOException $e){   
            echo "¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine();  
        }
        
        if ($data) {
            $verificar = true;
        } else {
            $verificar = false;
        }

        $conn = null;
        return $verificar;
    }
}
?>