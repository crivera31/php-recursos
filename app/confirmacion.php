<?php
require_once 'libreria/vendor/autoload.php';
session_start();
if (!isset($_SESSION['carrito'])) {
  header('location: home');
}
date_default_timezone_set("America/Lima");
$fecha = date("Y-m-d");
$hora = date("H:i:s");

require_once 'class/conexion.php';
require_once 'class/Distrito.php';
require_once 'class/Pedido.php';
require_once 'class/Detalle_pedido.php';

$cl_distrito = new Distrito();
$cl_pedido = new Pedido();
$cl_detalle_pedido = new Detalle_pedido();

$total = 0;
foreach ($_SESSION['carrito'] as $indice => $producto) {
  $total = $total + ($producto['precio'] * $producto['cantidad']);
}

$generar_codigo = $cl_pedido->generar_codigo();
$year = date("Y");
    if (strlen($generar_codigo) == 1) {
        $cod = $year.'-0000'.$generar_codigo;
    }
    if (strlen($generar_codigo) == 2) {
        $cod = $year.'-000'.$generar_codigo;
    }
    if (strlen($generar_codigo) == 3) {
        $cod = $year.'-00'.$generar_codigo;
    }
    if (strlen($generar_codigo) == 4) {
        $cod = $year.'-0'.$generar_codigo;
    }
    if (strlen($generar_codigo) == 5) {
        $cod = $year.'-0'.$generar_codigo;
    }
    if (strlen($generar_codigo) == 6) {
        $cod = $year.'-'.$generar_codigo;
    }

$direccion = $_POST['pro_direccion'];
$referencia = $_POST['pro_referencia'];
$distrito = $_POST['distrito'];
$estado_p = 'Pagado';

$cl_distrito->setId($distrito);
$cl_distrito->mostrar_ubicacion();
$cad1 = $cl_distrito->getDepartamento();
$cad2 = $cl_distrito->getProvincia();
$cad3 = $cl_distrito->getDistrito();
$ubicacion = $cad1 . ' / ' . $cad2 . ' / ' . $cad3;


#proceso del pago
$amount = $_POST['amount'];
$description = $_POST['label'];

$token = $_REQUEST["token"];
$payment_method_id = $_REQUEST["payment_method_id"];
// $installments = $_REQUEST["installments"];
$issuer_id = $_REQUEST["issuer_id"];

MercadoPago\SDK::setAccessToken("TEST-5092705296605820-042819-6d850ef20c7177b8f5f997cc03af8fbc-556089562");
//...
$payment = new MercadoPago\Payment();
$payment->transaction_amount = $amount;
$payment->token = $token;
$payment->description = $description;
// $payment->installments = $installments;
$payment->installments = 1;
$payment->payment_method_id = $payment_method_id;
$payment->issuer_id = $issuer_id;
$payment->payer = array(
  "email" => "karl@yahoo.com"
);
// Guarda y postea el pago
$payment->save();
//...
// Imprime el estado del pago
$estado = $payment->status;
// echo $payment->status;
// echo '<br>';
// echo $payment->transaction_amount;
// echo '<br>';
// echo $payment->token;
// echo '<br>';
// echo '<pre>';
// print_r($payment);
// echo  '</pre>';
// echo var_dump($estado);

if ($estado == 'approved') {
  // echo 'APROBADO';
  #registrar pedido
  $cl_pedido->setUbicacion($ubicacion);
  $cl_pedido->setDireccion($direccion);
  $cl_pedido->setReferencia($referencia);
  $cl_pedido->setFecha($fecha);
  $cl_pedido->setHora($hora);
  $cl_pedido->setTotal($total);
  $cl_pedido->setCliente_id($_SESSION['id_cliente']);
  $cl_pedido->setEstado($estado_p);
  $cl_pedido->setNum_pedido($cod);
  $ID_pedido = $cl_pedido->reg_pedido();
  #registrar detalle-pedido y items de carrito a 0
  $count_productos = count($_SESSION['carrito']);
  $cont = 0;
  foreach ($_SESSION['carrito'] as $indice => $producto) {
    $cl_detalle_pedido->setProducto_id($producto['id']);
    $cl_detalle_pedido->setPrecio($producto['precio']);
    $cl_detalle_pedido->setCantidad($producto['cantidad']);
    $cl_detalle_pedido->setPedido_id($ID_pedido);

    $result = $cl_detalle_pedido->reg_detalle_pedido();
    $cont++;
  }
  if ($cont == $count_productos) {
    unset($_SESSION['carrito']);
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Confirmacion | Segebuco</title>
  <?php include_once 'includes/head.php'; ?>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-156571536-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-156571536-1');
  </script>
</head>

<body class="shopping-cart-page error-page">
  <div id="page">
    <!-- Header -->
    <header>
      <?php include_once 'includes/header.php'; ?>
    </header>
    <section class="content-wrapper">
      <div class="container">
        <div class="std">
          <div class="page-not-found wow bounceInRight animated">
<?php if($estado == 'approved'){ ?>
            <h4>Gracias por tu compra.</h4>
            <h3>Recibirás tu pedido dentro de 24 horas.</h3>
            <div><a href="/mi_cuenta" type="button" class="btn-home"><span>Ver pedidos</span></a></div>
<?php } else { ?>
            <h4>Problemas al realizar el pago.</h4>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>
    <!--End main-container -->
    <?php include_once 'includes/footer.php'; ?>
  </div>
  <?php include_once 'includes/menu_mobile.php'; ?>
  <!-- JavaScript -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/revslider.js"></script>
  <script type="text/javascript" src="js/common.js"></script>

  <script type="text/javascript" src="js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="js/jquery.mobile-menu.min.js"></script>
</body>

</html>