<?php
require_once '../../class/conexion.php';

$db = new conexionDB();
$conn = $db->getConexion();

try {
    $query = "SELECT * FROM clientes WHERE tipo = 1";
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
    'nombres' => $row['nombres'],
    'apellido_p' => $row['ape_paterno'],
    'apellido_m' => $row['ape_materno'],
    'dni' => $row['dni']
  );
}
$jsonstring = json_encode($json);
echo $jsonstring;
?>