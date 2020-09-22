<?php 
	session_start();
    require_once '../class/Docente.php';
    
    $cl_docente = new Docente();

    $nom_docente = filter_input(INPUT_POST, 'nomDocente');
    $ap_paterno = filter_input(INPUT_POST, 'ap_paterno');
    $ap_materno = filter_input(INPUT_POST, 'ap_materno');
    $dni = filter_input(INPUT_POST, 'dni');
    $hrs_prog = filter_input(INPUT_POST, 'hrs_programadas');
    $jor_laboral = filter_input(INPUT_POST, 'jornada_laboral');
    $grado = filter_input(INPUT_POST, 'n_grado');
    $seccion = filter_input(INPUT_POST, 'n_seccion');
    $idDirector = $_SESSION['IdDirector'];

    // echo $nom_docente . ' / ' . $ap_paterno . ' / ' . $ap_materno . ' / ' . $dni . ' / ' . $hrs_prog . ' / ' . $jor_laboral . ' / ' . $grado . ' / ' . $seccion;
    if (trim($nom_docente) == '' || trim($ap_paterno) == '' || trim($ap_materno) == '' || trim($dni) == '' ) {
      echo 'llenar_campos';
    } else {
      $cl_docente->setNombre($nom_docente);
      $cl_docente->setA_paterno($ap_paterno);
      $cl_docente->setA_materno($ap_materno);
      $cl_docente->setDni($dni);
      $cl_docente->setHrs_programada($hrs_prog);
      $cl_docente->setJor_laboral($jor_laboral);
      $cl_docente->setNombre_grado($grado);
      $cl_docente->setNombre_seccion($seccion);
      $cl_docente->setDirector_id($idDirector);
  
      
      $validar = $cl_docente->Validar_grado_seccion();
  
      if ($validar) {
        // echo 'Ya existe un docente asignado al grado y seccion';
        echo 'docente_existente';
      } else {
  
        $result = $cl_docente->Add_docente();
        // echo 'Asignando docente al grado y seccion....';
        if ($result) {
            echo 'docente_agregado';
          } else {
          }
      }

    }

      
?>