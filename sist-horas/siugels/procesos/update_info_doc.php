<?php
require_once '../class/Docente.php';
$cl_docente = new Docente();

$nom = filter_input(INPUT_POST, 'nom');
$apaterno = filter_input(INPUT_POST, 'paterno');
$amaterno = filter_input(INPUT_POST, 'materno');
$dni = filter_input(INPUT_POST, 'dni');
$hrs = filter_input(INPUT_POST, 'hrs');
$jornada = filter_input(INPUT_POST, 'jornada');
$grado = filter_input(INPUT_POST, 'grado');
$seccion = filter_input(INPUT_POST, 'seccion');
$id_docente = filter_input(INPUT_POST, 'varID');

if (trim($nom) == '' || trim($apaterno) == '' || trim($amaterno) == '' || trim($dni) == '' || trim($hrs) == '' || trim($jornada) == '' 
  || trim($grado) == '' || trim($seccion) == '') {
  echo 'llenar_campos';
} else {
  $cl_docente->setNombre($nom);
  $cl_docente->setA_paterno($apaterno);
  $cl_docente->setA_materno($amaterno);
  $cl_docente->setDni($dni);
  $cl_docente->setHrs_programada($hrs);
  $cl_docente->setJor_laboral($jornada);
  $cl_docente->setNombre_grado($grado);
  $cl_docente->setNombre_seccion($seccion);
  $cl_docente->setId($id_docente);

  $result = $cl_docente->Update_info();
  if ($result) {
    echo 'actualizado';
  } else {
    echo 'error';
  }
}

?>