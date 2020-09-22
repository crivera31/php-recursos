<?php
require_once '../../class/conexion.php';

$db = new conexionDB();
$conn = $db->getConexion();

try {
    $query = "SELECT * FROM pedidos";
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
    'num_pedido' => $row['num_pedido'],
    'fecha' => date("Y-m-d", strtotime($row['fecha'])),
    'hora' => date("h:i:s a ", strtotime($row['hora'])),
    'total' => $row['total'], 
    'estado' => $row['estado']
  );
}
$jsonstring = json_encode($json);
echo $jsonstring;
?>