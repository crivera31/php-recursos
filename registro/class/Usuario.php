<?php
require_once 'conexionDB.php';
class Usuario{
  private $id;
  private $user;
  private $pass;

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
   * Get the value of user
   */ 
  public function getUser()
  {
    return $this->user;
  }

  /**
   * Set the value of user
   *
   * @return  self
   */ 
  public function setUser($user)
  {
    $this->user = $user;
  }

  /**
   * Get the value of pass
   */ 
  public function getPass()
  {
    return $this->pass;
  }

  /**
   * Set the value of pass
   *
   * @return  self
   */ 
  public function setPass($pass)
  {
    $this->pass = $pass;
  }

  
  function Login(){
    $existe = false;
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "SELECT username, pass FROM usuario WHERE username = :user and pass = :psw ";
        $data = $conn->prepare($query);
        $data->bindParam(':user', $this->user);
        $data->bindParam(':psw', $this->pass);
        $data->execute();
    } catch (PDOException $e) {
        echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $row = $data->fetchAll(PDO::FETCH_ASSOC);
    $row_count = $data->rowCount();

    if ($row_count > 0) {
        $existe = true;
        foreach ($row as $fila) {
            $this->user = $fila['username'];
            $this->pass = $fila['pass'];
        }
    } else {
        $existe = false;
    }

    $conn = null;
    return $existe;
}

}