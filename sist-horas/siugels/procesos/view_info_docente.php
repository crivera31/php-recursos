<?php
 session_start();
 require_once '../class/Docente.php';
 $cl_docente = new Docente();

$id_docente = filter_input(INPUT_POST, 'docente_id');
$cl_docente->setId($id_docente);

$result = $cl_docente->View_info_docente();

$json = array();
foreach ($result as $row) { 
  $json[] = array(
    'id' => $row['IdDocente'],
    'nombre' => $row['nombre'],
    'a_paterno' => $row['ape_paterno'],
    'a_materno' => $row['ape_materno'],
    'dni' => $row['dni'],
    'jor_laboral' => $row['jornada_laboral'],
    'hrs_progr' => $row['hrs_programadas'],
    'n_grado' => $row['nombre_grado'],
    'n_seccion' => $row['nombre_seccion']
  );
}
  $jsonstring = json_encode($json[0]); ////codificar el primer elemento del array
  echo $jsonstring;
?>