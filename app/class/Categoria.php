<?php
// require_once 'conexion.php';
class Categoria{
    private $id;
    private $codigo;
    private $nombre; //nombre padre
    private $nom_hijo;
    private $descripcion;
    private $padre_id;
    private $estado;
    private $fecha; //fecha en q se agrege la categoria y las sub
    /*para el Breadcrumbs */
    private $padre;
    private $categoria;
    private $seccion;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getPadre_id()
    {
        return $this->padre_id;
    }

    public function setPadre_id($padre_id)
    {
        $this->padre_id = $padre_id;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function setNom_hijo($nom_hijo)
    {
        $this->nom_hijo = $nom_hijo;
    }

    public function getNom_hijo()
    {
        return $this->nom_hijo;
    }

    public function Breadcrumbs(){ //muestra camara/camara analogica/serie it...
        $existe = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT  c1.nombre as 'padre',
                            c2.nombre as 'categoria',
                            c3.nombre as 'seccion'
                    from categorias c1
                    INNER JOIN categorias c2
                    on c2.padre_id = c1.id
                    INNER JOIN categorias c3
                    on c3.padre_id = c2.id
                    WHERE c3.id = :codigo";
            $data = $conn->prepare($query);
            $data->bindParam(':codigo', $this->codigo);
            $data->execute();
        } catch(PDOException $e){
            die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);
        $row_count = $data->rowCount();

        if ($row_count >0) {
            $existe = true;
            foreach($fila as $row){
                $this->padre = $row ['padre'];
                $this->categoria = $row ['categoria'];
                $this->seccion = $row['seccion'];
            }
        } else {
            $existe = false;
        }

        $conn = null;
        return $existe;
    }

    public function Breadcrumbs1(){ //muestra camara/camara analogica
        $existe = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT  c1.nombre as 'padre',c2.nombre as 'categoria'
                    from categorias c1
                    INNER JOIN categorias c2
                    on c2.padre_id = c1.id
                    WHERE c2.id = :codigo";
            $data = $conn->prepare($query);
            $data->bindParam(':codigo', $this->codigo);
            $data->execute();
        } catch(PDOException $e){
            die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);
        $row_count = $data->rowCount();

        if ($row_count >0) {
            $existe = true;
            foreach($fila as $row){
                $this->padre = $row ['padre'];
                $this->categoria = $row ['categoria'];
            }
        } else {
            $existe = false;
        }

        $conn = null;
        return $existe;
    }

    function Mostrar_TODO(){  // mostrar todos los productos
        // $existe = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT * FROM categorias where padre_id = 0 ORDER BY id ASC";
            $data = $conn->query($query);
            $data->execute();
        } catch(PDOException $e){
            die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);

        $conn = null;
        return $fila;
    }

    function tag_single(){
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT * FROM categorias WHERE id = :id";
            $data = $conn->prepare($query);
            $data->bindParam(':id', $this->id);
            $data->execute();
        } catch(PDOException $e){
            die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);

        $conn = null;
        return $fila;
    }

    function tag_add()
    {
        $verificar = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "INSERT INTO categorias(nombre, descripcion, padre_id, estado, fecha) 
                    VALUES(:nombre, :descri, 0, 1, CURRENT_TIMESTAMP())";
            $data = $conn->prepare($query);
            $data->bindParam(':nombre', $this->nombre);
            $data->bindParam(':descri', $this->descripcion);
            $data->execute();
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
        }

        if ($data) {
            $verificar = true;
        } else {
            $verificar = false;
        }
  
        $conn = null;
        return $verificar;
    }

    function tag_edit()
    {
        $verificar = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "UPDATE categorias SET nombre = :nombre WHERE id = :id" ;
            $data = $conn->prepare($query);
            $data->bindParam(':id', $this->id);
            $data->bindParam(':nombre', $this->nombre);
            $data->execute();
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
        }

        if ($data) {
            $verificar = true;
        } else {
            $verificar = false;
        }
  
        $conn = null;
        return $verificar;
    }

    function add_categoria() 
    {
        $verificar = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "INSERT INTO categorias(nombre, descripcion, padre_id, estado, fecha) 
                    VALUES(:nombre, :descripcion, :padre_id, 1, CURRENT_TIMESTAMP())";
            $data = $conn->prepare($query);
            $data->bindParam(':nombre', $this->nombre);
            $data->bindParam(':descripcion', $this->descripcion);
            $data->bindParam(':padre_id', $this->padre_id);
            $data->execute();
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
        }

        if ($data) {
            $verificar = true;
            // $categoria = $conn->lastInsertId();
        } else {
            $verificar = false;
        }
  
        $conn = null;
        return $verificar;
    }

    function carga_select_categoria()
    {
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT * FROM categorias WHERE padre_id = :padre_id and estado = 1";
            $data = $conn->prepare($query);
            $data->bindParam(':padre_id', $this->padre_id);
            $data->execute();
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);

        $conn = null;
        return $fila;
    }

    function add_seccion() 
    {
        $verificar = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "INSERT INTO categorias(nombre, descripcion, padre_id, estado, fecha) 
                    VALUES(:nombre, :descripcion, :padre_id, 1, CURRENT_TIMESTAMP())";
            $data = $conn->prepare($query);
            $data->bindParam(':nombre', $this->nombre);
            $data->bindParam(':padre_id', $this->padre_id);
            $data->bindParam(':descripcion', $this->descripcion);
            $data->execute();
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
        }

        if ($data) {
            $verificar = true;
            // $categoria = $conn->lastInsertId();
        } else {
            $verificar = false;
        }
  
        $conn = null;
        return $verificar;
    }

    function carga_menus()
    {
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT c1.id, c1.nombre, c2.nombre as 'padre',c1.descripcion, c1.estado from categorias c1
                    INNER JOIN categorias c2 on c1.padre_id = c2.id
                    WHERE c1.padre_id != 0 order by c1.id,c2.nombre asc";
            $data = $conn->query($query);
            $data->execute();
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);

        $conn = null;
        return $fila;
    }
    public function getPadre()
    {
        return $this->padre;
    }
    public function setPadre($padre)
    {
        $this->padre = $padre;

        return $this;
    }
    public function getCategoria()
    {
        return $this->categoria;
    }
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }
    public function getSeccion()
    {
        return $this->seccion;
    }
    public function setSeccion($seccion)
    {
        $this->seccion = $seccion;

        return $this;
    }

    function habilitar_categoria()
    {
        $verificar = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "UPDATE categorias SET estado = 1 WHERE id = :id" ;
            $data = $conn->prepare($query);
            $data->bindParam(':id', $this->id);
            $data->execute();
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
        }

        if ($data) {
            $verificar = true;
        } else {
            $verificar = false;
        }
  
        $conn = null;
        return $verificar;
    }

    function deshabilitar_categoria()
    {
        $verificar = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "UPDATE categorias SET estado = 0 WHERE id = :id" ;
            $data = $conn->prepare($query);
            $data->bindParam(':id', $this->id);
            $data->execute();
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
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
