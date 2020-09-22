<?php
  session_start();
  require_once '../class/HorasLaboradas.php';
  $cl_horas = new HorasLaboradas();
  
  $cantHoras = filter_input(INPUT_POST, 'cantHoras');
  $fechaHoras = filter_input(INPUT_POST, 'fechaHora');
  $IDdocente = filter_input(INPUT_POST, 'IDdocente');
  $observacion = filter_input(INPUT_POST, 'observacion');

  // echo 'reg => '.$cantHoras. '/' .$fechaHoras. '/' .$IDdocente . '/' . $observacion;

  $cl_horas->setHoras($cantHoras);
  $cl_horas->setFecha($fechaHoras);
  $cl_horas->setDocenteID($IDdocente);
  $cl_horas->setObservacion($observacion);

  $validar = $cl_horas->Validar_horas();

  if ($validar) {
    echo 'fecha_repetida';
  } else {
    $result = $cl_horas->Add_horas_laboradas();
    if ($result) {
      echo 'hora_agregada';
    } else {
      echo 'error';
    }

  }

?>