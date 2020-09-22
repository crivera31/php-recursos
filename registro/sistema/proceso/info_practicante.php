<?php
require_once '../class/Practicante.php';
$cl_practicante = new Practicante();

$id = filter_input(INPUT_POST, 'id');
$cl_practicante->setId($id);

$result = $cl_practicante->Info_practicante();

$json = array();
foreach ($result as $row) { 
  $json[] = array(
    'id' => $row['id'],
    'nombre' => $row['nombre'],
    'a_paterno' => $row['apaterno'],
    'a_materno' => $row['amaterno'],
    'dni' => $row['dni'],
    'direccion' => $row['direccion'],
    'ubicacion' => $row['ubicacion'],
    'correo' => $row['correo'],
    'telefono' => $row['telefono'],
    'pedido' => $row['descrip_pedido'],
    'documentos' => $row['documentos_adjuntar'],
    'fecha' => $row['fecha']
  );
}
  $jsonstring = json_encode($json[0]); ////codificar el primer elemento del array
  echo $jsonstring;

?>