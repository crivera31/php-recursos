<?php
session_start();
require_once '../class/Colegio.php';

$id_director = $_SESSION['directorID'];
// print_r ($_SESSION);

$cl_colegio = new Colegio();
$cl_colegio->setDirectorID($id_director);

$result = $cl_colegio->View_institucion();

// $_SESSION['colegioID'] = $cl_colegio->getId();

$json = array();
foreach ($result as $row) { 
  $json[] = array(
    'id' => $row['IdInstitucion'],
    'nombre' => $row['nombre'],
    'direccion' => $row['direccion'],
    'niveles' => $row['niveles'],
    'distritoID' => $row['IdDistrito']
  );
}
  $jsonstring = json_encode($json); ////codificar el primer elemento del array
  echo $jsonstring;
?>