<?php
  session_start();
  require_once '../class/Grado.php';
  
  $cl_grado = new Grado();
  
  $nom_grado = filter_input(INPUT_POST, 'grado');
  $nom_seccion = filter_input(INPUT_POST, 'seccion');
  $nivel_id = filter_input(INPUT_POST, 'nivel_id');
  $institucion_id = filter_input(INPUT_POST, 'institucion_id');

  // echo $institucion_id . ' ==> ' . $nom_grado . ' ==> ' . $nom_seccion . ' ==> ' . $nivel_id;
  if (trim($nom_grado) == '' || trim($nom_seccion) == '') {
    echo 'llenar_campos';
  } else {
    $cl_grado->setNom_grado($nom_grado);
    $cl_grado->setNom_seccion($nom_seccion);
    $cl_grado->setId_nivel($nivel_id);
    $cl_grado->setId_institucion($institucion_id);

    $validar = $cl_grado->Validar_grados();

    if ($validar) {
      echo 'seccion_existente';
    } else {
      $result = $cl_grado->Add_grado_por_institucion();
    
      if ($result) {
        echo 'agregado';
      } else {
        echo 'error';
      }
    }
  
  }
?>