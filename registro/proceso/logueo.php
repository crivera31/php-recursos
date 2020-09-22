<?php
  session_start();
  require_once '../class/Usuario.php';  
  $cl_usuario = new Usuario();

  $username = filter_input(INPUT_POST, 'user');
  $password = filter_input(INPUT_POST, 'pass');
  //encriptar pass
  $pass_cifrado = sha1($password);
  
  $cl_usuario->setUser($username);
  $cl_usuario->setPass($pass_cifrado);

  if (empty($username) || empty($password)) { //si estan vacios

    echo 'llenar_campos';
    
  } else {

    $result = $cl_usuario->Login();    
    if ($result) {
        $_SESSION['active'] = true;  //se validara si existe para no ir a login
        $_SESSION['usuario'] = $cl_usuario->getUser();
        echo 'datos_correctos';

    } else {
      session_destroy();
      echo 'datos_incorrectos';
    }
  }
?>