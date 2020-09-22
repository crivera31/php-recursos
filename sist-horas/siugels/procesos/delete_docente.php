<?php 
  require_once '../class/Docente.php';

  $cl_docente = new Docente();

  $fila_id = filter_input(INPUT_POST, 'id');

  $cl_docente->setId($fila_id);

  $result = $cl_docente->Delete_docente();

  if ($result) {
    echo 'true';
  } else {
    echo 'false';
  }
?>