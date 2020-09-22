<?php
require_once '../class/Colegio.php';
$cl_colegio = new Colegio();

$nom = filter_input(INPUT_POST, 'nom');
$direc = filter_input(INPUT_POST, 'direc');
$ref = filter_input(INPUT_POST, 'ref');
$telf = filter_input(INPUT_POST, 'telf');
$id_cole = filter_input(INPUT_POST, 'varID');

if (trim($nom) == '' || trim($direc) == '' || trim($ref) == '' || trim($telf) == '') {
  echo 'llenar_campos';
} else {
  $cl_colegio->setNombre($nom);
  $cl_colegio->setDireccion($direc);
  $cl_colegio->setReferencia($ref);
  $cl_colegio->setTelefono($telf);
  $cl_colegio->setId($id_cole);

  $result = $cl_colegio->Update_info();
  if ($result) {
    echo 'actualizado';
  } else {
    echo 'error';
  }
}
?>