<?php
// require_once 'conexion.php';
class Producto{
    private $id;
    private $codigo;
    private $padre_id;
    private $categoria_id;
    private $nombre;
    private $ficha_tecnica;
    private $descripcion; //sera para buscar
    private $tags;
    private $precio_venta;
    private $precio_compra;
    private $descuento;
    private $activo;
    private $foto;
    private $top; // los 5 mas vendidos
    private $estado; //es tipo nuevo, no nuevo y oferta 
    private $fecha; //fecha y hora en q se agrego
    private $nuevo;
    private $search;
    private $stock;

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

    public function getPrecio_venta()
    {
        return $this->precio_venta;
    }

    public function setPrecio_venta($precio_venta)
    {
        $this->precio_venta = $precio_venta;
    }

    public function getPrecio_compra()
    {
        return $this->precio_compra;
    }

    public function setPrecio_compra($precio_compra)
    {
        $this->precio_compra = $precio_compra;
    }

    public function getFoto()
    {
        return $this->foto;
    }

    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    public function getTop()
    {
        return $this->top;
    }

    public function setTop($top)
    {
        $this->top = $top;
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

    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;
    }

    public function getFicha_tecnica()
    {
        return $this->ficha_tecnica;
    }

    public function setFicha_tecnica($ficha_tecnica)
    {
        $this->ficha_tecnica = $ficha_tecnica;
    }

    function Mostrar_5_top(){  //5 productos mas vendidos
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT * FROM productos WHERE estado = 1 and top = 1 limit 5";
            $data = $conn->query($query);
            $data->execute();
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
        }
        
        $fila = $data->fetchAll(PDO::FETCH_ASSOC);
        $conn = null;
        return $fila;
    }

    function Mostrar_new_productos(){  //nuevos productos
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT * FROM productos WHERE nuevo = 1 and estado = 1";
            $data = $conn->query($query);
            $data->execute();
        } catch (PDOException $e) {
            die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
        }
        
        $fila = $data->fetchAll(PDO::FETCH_ASSOC);
        $conn = null;
        return $fila;
    }

    function Mostrar_detalles_producto(){  //detallos de productos
        $existe = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT * FROM productos where codigo = :codigo ";
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
                $this->id = $row['id'];
                $this->stock = $row['stock'];
                $this->codigo = $row['codigo'];
                $this->descripcion = $row['descripcion'];
                $this->tags = $row['tags'];
                $this->precio_compra = $row['precio_compra'];
                $this->precio_venta = $row['precio_venta'];
                $this->descuento = $row['descuento'];
                $this->ficha_tecnica = $row['ficha_tecnica'];
                $this->foto = $row['foto'];
                $this->estado = $row['estado'];
                $this->top = $row['top'];
                $this->nuevo = $row['nuevo'];
                $this->padre_id = $row['padre_id'];
                $this->categoria_id = $row['categoria_id'];
            }
        } else {
            $existe = false;
        }

        $conn = null;
        return $existe;
    }

    function Count_productos(){  //Mostrar_cantidad_productos_x_categoria productos por categoria
        $existe = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT count(*) FROM productos where padre_id = :categoria_id ";
            $data = $conn->prepare($query);
            $data->bindParam(':categoria_id', $this->categoria_id);
            $data->execute();
        } catch(PDOException $e){   
            die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
        }

        $number_of_rows = $data->fetchColumn();

        $conn = null;
        return $number_of_rows;
    }

    function Mostrar_productos($dato){  // mostrar productos por categoria seleccionada
        // $existe = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT * FROM productos where categoria_id = $dato and estado = 1 ORDER BY id asc";
            $data = $conn->query($query);
            $data->execute();
        } catch(PDOException $e){   
            die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);

        $conn = null;
        return $fila;
    }

    function Mostrar_x_padreID($dato){  // mostrar productos por categoria seleccionada
        // $existe = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT * FROM productos where padre_id = $dato and estado = 1 ORDER BY id asc";
            $data = $conn->query($query);
            $data->execute();
        } catch(PDOException $e){   
            die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);

        $conn = null;
        return $fila;
    }

    function Mostrar_TODO(){// mostrar todos los productos
        // $existe = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT * FROM productos WHERE estado = 1 ORDER BY id asc";
            $data = $conn->query($query);
            $data->execute();
        } catch(PDOException $e){
            die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);

        $conn = null;
        return $fila;
    }
    function search($search){// mostrar todos los productos
        // $existe = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT * FROM productos
                    WHERE (ficha_tecnica LIKE '%$search%' || descripcion LIKE '%$search%' ||  codigo LIKE '%$search%' 
                    ||  tags LIKE '%$search%') and estado = 1";
            $data = $conn->query($query);
            $data->execute();
        } catch(PDOException $e){
            die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);

        $conn = null;
        return $fila;
    }
    function Mostrar_admin(){// mostrar todos los productos
        // $existe = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT * FROM productos ORDER BY id asc";
            $data = $conn->query($query);
            $data->execute();
        } catch(PDOException $e){
            die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);

        $conn = null;
        return $fila;
    }
    function Mostrar_ofertas(){// mostrar todos los productos
        // $existe = false;
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT * FROM productos WHERE nuevo = 3  and estado = 1 ORDER BY id asc";
            $data = $conn->query($query);
            $data->execute();
        } catch(PDOException $e){   
            die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);

        $conn = null;
        return $fila;
    }

    function Mostrar_galeria_index(){
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT * FROM productos where estado = 1 order BY id asc limit 8";
            $data = $conn->query($query);
            $data->execute();
        } catch(PDOException $e){   
            die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);

        $conn = null;
        return $fila;
    }

    public function reg_producto()
    {
        $grabado = false;
        $db = new conexionDB();
        $conn = $db->getConexion();
        try {
            $query = "INSERT INTO productos(codigo,padre_id,categoria_id,ficha_tecnica,descripcion,precio_compra,precio_venta,
                    descuento,stock,foto,top,nuevo,estado,fecha) 
                    VALUES( :codigo,:padre_id,:categoria_id,:ficha,:descripcion,:compra,:venta,:descuento,0,:foto,:top,:nuevo,:estado,CURRENT_TIMESTAMP())";
            $data = $conn->prepare($query);
            $data->bindParam(':codigo', $this->codigo);
            $data->bindParam(':padre_id', $this->padre_id);
            $data->bindParam(':categoria_id', $this->categoria_id);
            $data->bindParam(':ficha', $this->ficha_tecnica);
            $data->bindParam(':descripcion', $this->descripcion);
            $data->bindParam(':venta', $this->precio_venta);
            $data->bindParam(':compra', $this->precio_compra);
            $data->bindParam(':descuento', $this->descuento);
            $data->bindParam(':estado', $this->estado);
            $data->bindParam(':foto', $this->foto);
            $data->bindParam(':top', $this->top);
            $data->bindParam(':nuevo', $this->nuevo);
            $data->execute();
        } catch(PDOException $e){
            die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
        }
    
        if ($data) {
            $grabado = true;
          } else {
            $grabado = false;
          }
          $conn = null;
          return $grabado;
      }

    function obtener_niveles($id) /**muestra los niveles de cada producto */
    {
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT c1.nombre as 'familia', c2.nombre as 'categoria', c3.nombre as 'seccion' 
                        from categorias c1 INNER JOIN categorias c2 on c2.padre_id = c1.id
                        INNER JOIN categorias c3 on c3.padre_id = c2.id WHERE c3.id = $id ";
            $data = $conn->query($query);
            $data->execute();
        } catch(PDOException $e){
            die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);
        $row_count = $data->rowCount();
        $niveles = array();
        if ($row_count >0) {
            foreach($fila as $row){
                $niveles[0] = $row ['familia'];
                $niveles[1] = $row ['categoria'];
                $niveles[2] = $row ['seccion'];
            }
        }
        $conn = null;
        return $niveles;
    }

    function obtener_niveles1($id) /**muestra los niveles de cada producto */
    {
        $db = new conexionDB();
        $conn = $db->getConexion();

        try {
            $query = "SELECT c1.nombre as 'familia', c2.nombre as 'categoria'
                        from categorias c1
                        INNER JOIN categorias c2 on c2.padre_id = c1.id
                        WHERE c2.id = $id ";
            $data = $conn->query($query);
            $data->execute();
        } catch(PDOException $e){
            die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
        }

        $fila = $data->fetchAll(PDO::FETCH_ASSOC);
        $row_count = $data->rowCount();
        $niveles = array();
        if ($row_count >0) {
            foreach($fila as $row){
                $niveles[0] = $row ['familia'];
                $niveles[1] = $row ['categoria'];
                // $niveles[2] = $row ['seccion'];
            }
        }
        $conn = null;
        return $niveles;
    }

    public function update_producto()
    {
        $grabado = false;
        $db = new conexionDB();
        $conn = $db->getConexion();
        try {
            $query = "UPDATE productos SET codigo = :codigo, ficha_tecnica = :ficha,descripcion = :descripcion, tags = :tags,
                    precio_venta = :venta,precio_compra = :compra, descuento = :descuento, top = :top, nuevo = :nuevo, estado = :estado where id = :id";
            $data = $conn->prepare($query);
            $data->bindParam(':id', $this->id);
            $data->bindParam(':codigo', $this->codigo);
            $data->bindParam(':compra', $this->precio_compra);
            $data->bindParam(':venta', $this->precio_venta);
            $data->bindParam(':descuento', $this->descuento);
            $data->bindParam(':descripcion', $this->descripcion);
            $data->bindParam(':ficha', $this->ficha_tecnica);
            $data->bindParam(':tags', $this->tags);
            $data->bindParam(':top', $this->top);
            $data->bindParam(':nuevo', $this->nuevo);
            $data->bindParam(':estado', $this->estado);
            $data->execute();
        } catch(PDOException $e){
            die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
        }
    
        if ($data) {
            $grabado = true;
          } else {
            $grabado = false;
          }
          $conn = null;
          return $grabado;
      }

      public function update_categoria()
      {
          $grabado = false;
          $db = new conexionDB();
          $conn = $db->getConexion();
          try {
              $query = "UPDATE productos SET padre_id = :categoria, categoria_id = :seccion
                        where codigo = :codigo";
              $data = $conn->prepare($query);
              $data->bindParam(':codigo', $this->codigo);
              $data->bindParam(':categoria', $this->padre_id);
              $data->bindParam(':seccion', $this->categoria_id);
              $data->execute();
          } catch(PDOException $e){
              die("¡Error!: ".$e->getMessage()." Archivo: ".$e->getFile()." Linea: ".$e->getLine());
          }
      
          if ($data) {
              $grabado = true;
            } else {
              $grabado = false;
            }
            $conn = null;
            return $grabado;
        }

    public function getNuevo()
    {
        return $this->nuevo;
    }

    public function setNuevo($nuevo)
    {
        $this->nuevo = $nuevo;
    }

    public function getPadre_id()
    {
        return $this->padre_id;
    }

    public function setPadre_id($padre_id)
    {
        $this->padre_id = $padre_id;
    }

    public function getDescuento()
    {
        return $this->descuento;
    }
    public function setDescuento($descuento)
    {
        $this->descuento = $descuento;
    }

    public function getActivo()
    {
        return $this->activo;
    }

    public function setActivo($activo)
    {
        $this->activo = $activo;
    }

    public function getSearch()
    {
        return $this->search;
    }

    public function setSearch($search)
    {
        $this->search = $search;
    }

    /**
     * Get the value of tags
     */ 
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set the value of tags
     *
     * @return  self
     */ 
    public function setTags($tags)
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $stock;
        return $this;
    }
}
?>