<?php
session_start();
require_once '../class/Docente.php';
$cl_docente = new Docente();

$idDirector = $_SESSION['IdDirector'];

$cl_docente->setDirector_id($idDirector);
$result = $cl_docente->View_docentes_x_inst();


$json = array();
foreach ($result as $row) {
  $json[] = array(
    'id' => $row['IdDocente'],
    'nombre' => $row['nombre'],
    'a_paterno' => $row['ape_paterno'],
    'a_materno' => $row['ape_materno'],
    'dni' => $row['dni']
  );
}
$jsonstring = json_encode($json); ////codificar el primer elemento del array
echo $jsonstring;

?>