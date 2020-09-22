<?php
session_start();
require_once '../class/Colegio.php';

$cl_colegio = new Colegio();

$id_colegio = filter_input(INPUT_POST, 'id_colegio');
$id_distrito = filter_input(INPUT_POST, 'distritoID');
// echo $id_colegio;

$cl_colegio->setId($id_colegio);
$cl_colegio->setDistritoID($id_distrito);

$result = $cl_colegio->View_info_inst();

$json = array();
// foreach ($result as $row) { 
  $json[] = array(
    'id' => $cl_colegio->getId(),
    'nombre' => $cl_colegio->getNombre(),
    'direccion' => $cl_colegio->getDireccion(),
    'referencia' => $cl_colegio->getReferencia(),
    'niveles' => $cl_colegio->getNiveles(),
    'telefono' => $cl_colegio->getTelefono(),
    'depart' => $cl_colegio->getDepartmento(),
    'provin' => $cl_colegio->getProvincia(),
    'distr' => $cl_colegio->getDistrito()
  );
// }
  $jsonstring = json_encode($json[0]); ////codificar el primer elemento del array
  echo $jsonstring;

?>