<?php
  session_start();
  require_once '../class/Usuario.php';  
  $cl_usuario = new Usuario();

  $username = filter_input(INPUT_POST, 'user');
  $password = filter_input(INPUT_POST, 'pass');
  //encriptar pass
  $pass_cifrado = sha1($password);
  
  $cl_usuario->setUsername($username);
  $cl_usuario->setPassword($pass_cifrado);

  if (empty($username) || empty($password)) { //si estan vacios

    echo 'llenar_campos';
    
  } else {
    $result = $cl_usuario->Login();// llamamos a la funcion LOGIN de usuario.php
    $directorID = $cl_usuario->getId(); //recuperamos el id del usuario(del director) logueado
    
    if ($result) {
        $_SESSION['active'] = true;  //se validara si existe para no ir a login
        $_SESSION['directorID'] = $cl_usuario->getId(); //
        $_SESSION['IdDirector'] = $directorID;
        $_SESSION['nickuser'] = $cl_usuario->getUsername();
        $_SESSION['rolID'] = $cl_usuario->getIdRol();
        echo 'datos_correctos';

    } else {
      echo 'datos_incorrectos';
    }
  }
?>