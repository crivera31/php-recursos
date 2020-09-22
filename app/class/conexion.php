<?php
require_once 'config.php';
class conexionDB{
  private $con;
  private $tipo_db = driver; 
  private $host = host;
  private $user = usuario;
  private $pass = password;
  private $database = database;

  public function getConexion(){
    return $this->con;
  }

  public function __construct(){
      try{
          $this->con = new PDO($this->tipo_db.':host='.$this->host.';dbname='.$this->database, $this->user, $this->pass);
          $this->con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
          // $this->con->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
          $this->con -> exec("SET CHARACTER SET utf8");
      } catch (PDOException $e){
          die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
      }
  }
}
?>