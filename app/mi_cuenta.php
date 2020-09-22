<?php
session_start();

if(!isset($_SESSION['active'])){
  header('location: home');
}
require_once 'class/conexion.php';
require_once 'class/Cliente.php';
require_once 'class/Pedido.php';
$cl_cliente = new Cliente();
$cl_pedido = new Pedido();

$cl_cliente->setId($_SESSION['id_cliente']);
if ($_SESSION['tipo'] == 1 ) {
  $cl_cliente->Profile_persona();
} else {
  $cl_cliente->Profile_empresa();
}

$cl_pedido->setCliente_id($_SESSION['id_cliente']);
$row_pedidos = $cl_pedido->ver_pedido();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Mi cuenta | Segebuco</title>
  <?php include_once 'includes/head.php'; ?>
  <link rel="stylesheet" type="text/css" href="css/toastr.min.css">
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-156571536-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-156571536-1');
</script>

</head>

<body class="shopping-cart-page">
  <div id="page">
    <header>
      <?php include_once 'includes/header.php'; ?>
    </header>
    <div class="main-container col2-right-layout">
      <div class="main container">
        <div class="row">
          <section class="col-sm-9 wow bounceInUp animated">
            <div class="col-main">
              <div class="my-account">
                <div class="page-title">
                  <h2>Mi cuenta</h2>
                </div>
                <div class="dashboard">
                  <div class="welcome-msg">
                    <p>Bienvenido a tu cuenta, desde aquí puedes administrar tus datos personales y pedidos.</p>
                  </div>
                  <br>
                  <div class="recent-orders">
                    <div class="title-buttons"><strong>HISTORIAL Y DETALLES DE MIS PEDIDOS</strong></div><br><br>
                    <div class="table-responsive">
                      <table class="table data-table" id="my-orders-table">
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <col>
                        <thead>
                          <tr class="first last">
                            <th>N° Pedido</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th><span class="nobr">Total</span></th>
                            <th>Estado</th>
                            <th>&nbsp;</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php if (count($row_pedidos) == 0) { ?>
                          <tr class="first odd"><td class="text-center" colspan="6">No hay registros.</td></tr>
                        <?php } ?>

                        <?php foreach ($row_pedidos as $fila) { 
                            if($fila['estado'] == 'Pendiente') {
                              $estado = '<em style="color: #fe0000;">Pendiente</em>';
                            } else if($fila['estado'] == 'Pagado') {
                              $estado = '<em style="color: #00ce7c;">Pagado</em>';
                            } else {
                              $estado = '<em style="color: #008cff;">Enviado</em>';
                            }  
                        ?>
                            
                          <tr class="first odd">
                            <td><em><?php echo $fila['num_pedido']; ?></em></td>
                            <td><?php echo date("d/m/Y", strtotime($fila['fecha'])); ?></td>
                            <td><?php echo date("h:i:s a ", strtotime($fila['hora'])); ?></td>
                            <td><span class="price">S/ <?php echo $fila['total']; ?></span></td>
                            <td><?php echo $estado; ?></td>
                            <td class="a-center last"><span class="nobr"> <a href="detalle_pedido/<?php echo $fila['id']; ?>">Ver detalles</a></td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="box-account">
                    <div class="page-title">
                      <h2>Mis datos Personales</h2>
                    </div>
                    <?php 
                      if ($_SESSION['tipo'] == 1 ) {
                        include_once 'includes/cuenta_persona.php';
                      } else {
                        include_once 'includes/cuenta_empresa.php';
                      } 
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
    <?php include_once 'includes/footer.php'; ?>
  </div>
  <?php include_once 'includes/menu_mobile.php'; ?>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/revslider.js"></script>
  <script type="text/javascript" src="js/common.js"></script>

  <script type="text/javascript" src="js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="js/jquery.mobile-menu.min.js"></script>
  <script type="text/javascript" src="js/toastr.min.js"></script>
  <script type="text/javascript" src="js/paginathing.js"></script>

  <script type="text/javascript" src="js/funciones.js"></script>
  <script>
  $('.table tbody').paginathing({
      perPage: 3,
      insertAfter: '.table',
      pageNumbers: true
    });
  </script>
</body>
<script>
  $('.numeros').on('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
  });

  function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }
    if (letras.indexOf(tecla) == -1 && !tecla_especial)
      return false;
  }

  function limpia() {
    var val = document.getElementById("miInput").value;
    var tam = val.length;
    for (i = 0; i < tam; i++) {
      if (!isNaN(val[i]))
        document.getElementById("miInput").value = '';
    }
  }
</script>
</html>