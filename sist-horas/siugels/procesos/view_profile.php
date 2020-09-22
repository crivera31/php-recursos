<?php
  session_start();
  require_once '../../class/Usuario.php';
  $cl_usuario = new Usuario();

  $idDirector = $_SESSION['IdDirector'];
  $cl_usuario->setId($idDirector);

  $result = $cl_usuario->View_profile();

  if (!$result) { //si no hay un registro q coincide con el ID
    echo 'registro no encontrado';
  }

  $json = array();
  // foreach ($result as $row) {
    $json[] = array(
      'id' => $cl_usuario->getId(),
      'nombres' => $cl_usuario->getNombres(),
      'ape_paterno' => $cl_usuario->getApe_paterno(),
      'ape_materno' => $cl_usuario->getApe_materno(),
      'correo' => $cl_usuario->getCorreo(),
      'usuario' => $cl_usuario->getUsername()
      // 'rol' => $cl_usuario->getIdRol()
    );
  // }
  $jsonstring = json_encode($json[0]); ////codificar el primer elemento del array
  echo $jsonstring;

?>