<?php
  session_start();
  require_once '../../class/Usuario.php';
  $cl_usuario = new Usuario();
  
  $user = filter_input(INPUT_POST, 'usuario');
  $nombre = filter_input(INPUT_POST, 'nombres');
  $ape_paterno = filter_input(INPUT_POST, 'ape_paterno');
  $ape_materno = filter_input(INPUT_POST, 'ape_materno');
  $correo = filter_input(INPUT_POST, 'correo');
  $idDirector = $_SESSION['IdDirector'];

  if (trim($nombre) == '' || trim($ape_paterno) == '' || trim($ape_materno) == '' || trim($user) == '') {
    echo 'llenar_campos';
  } else {
    $cl_usuario->setId($idDirector);
    $cl_usuario->setUsername($user);
    $cl_usuario->setNombres($nombre);
    $cl_usuario->setApe_paterno($ape_paterno);
    $cl_usuario->setApe_materno($ape_materno);
    $cl_usuario->setCorreo($correo);
  
    $result = $cl_usuario->Update_profile();
    // echo $result;
    if ($result) {
      echo 'update_exito'; //hubo filas actualizadas
    } 
    // else {
    //   echo 'error al actualizar';//
    // }
  }
?>