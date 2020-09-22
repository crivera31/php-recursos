<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Acceder | Sistema Registro de Practicantes</title>
  <link rel="shortcut icon" href="img/home.ico" type="image/x-icon">
  <link rel="icon" href="img/home.ico" type="image/x-icon">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">
  <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="css/animate.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body class="gray-bg">
  <div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
      <div>
        <h1 class="logo-name"><img id="login" src="img/login.png" alt=""></h1>
      </div>
      <h3>Iniciar Sesión</h3>
      <form class="m-t" role="form" id="formLogin">
        <div class="form-group">
          <input type="text" id="user" name="user" class="form-control" placeholder="Usuario" >
        </div>
        <div class="form-group">
          <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" >
        </div>
        <button type="submit" id="linkButton" class="btn btn-primary block full-width m-b"><i class="fa fa-sign-in"></i> Entrar</button>
        <!-- <a href="#"><small>Forgot password?</small></a> -->
      </form>
    </div>
  </div>
  <!-- Mainly scripts -->
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/plugins/toastr/toastr.min.js"></script>
  <script src="js/funciones_login.js"></script>

</body>

</html>