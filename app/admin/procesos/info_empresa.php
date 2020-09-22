<?php
require_once '../../class/conexion.php';

$db = new conexionDB();
$conn = $db->getConexion();

try {
    $query = "SELECT * FROM clientes WHERE tipo = 2";
    $data = $conn->query($query);
    $data->execute();
} catch (PDOException $e) {
    die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
}

$fila = $data->fetchAll(PDO::FETCH_ASSOC);

$json = array();
foreach ($fila as $row) {
  $json[] = array(
    'id' => $row['id'],
    'nombre_titular' => $row['nombre_titular'],
    'apellido_titular' => $row['apellido_titular'],
    'razon_social' => $row['razon_social']
  );
}
$jsonstring = json_encode($json);
echo $jsonstring;
?>