<?php
 require_once '../class/Docente.php';
 $cl_docente = new Docente();

$id_departamento = filter_input(INPUT_POST, 'var1');
 
$cl_docente->setInstitucion_id($id_departamento);

$result = $cl_docente->View_all_docentes();

$json = array();
foreach ($result as $row) { 
  $json[] = array(
    'id' => $row['IdDocente'],
    'nombre' => $row['nombre'],
    'a_paterno' => $row['ape_paterno'],
    'a_materno' => $row['ape_materno'],
  );
}
  $jsonstring = json_encode($json); ////codificar el primer elemento del array
  echo $jsonstring;
?>