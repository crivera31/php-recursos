<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Carrito | Segebuco</title>
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

<body class="shopping-cart-page">
  <div id="page">
    <header>
      <?php include_once 'includes/header.php'; ?>
    </header>
    <section class="main-container col1-layout">
      <div class="main container">
        <div class="col-main">
          <div class="cart wow bounceInUp animated">
            <div class="page-title">
              <h2>Mi Carrito</h2>
            </div>
            <?php if (!empty($_SESSION['carrito'])) { ?>
              <div class="table-responsive">
                <!-- <form method="post" action="#updatePost/"> -->
                <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
                <fieldset>
                  <table class="data-table cart-table" id="shopping-cart-table">
                    <colgroup>
                      <col width="1">
                      <col>
                      <col width="1">
                      <col width="1">
                      <col width="1">
                      <col width="1">
                      <col width="1">
                    </colgroup>
                    <thead>
                      <tr class="first last">
                        <th rowspan="1">&nbsp;</th>
                        <th rowspan="1"><span class="nobr">Producto</span></th>
                        <th rowspan="1"></th>
                        <th colspan="1" class="a-center"><span class="nobr">Precio</span></th>
                        <th class="a-center" rowspan="1">Cantidad</th>
                        <th colspan="1" class="a-center">Importe</th>
                        <th class="a-center" rowspan="1">&nbsp;</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr class="first last">
                        <td class="a-right last" colspan="50"><button onClick="location.href='index';" class="button btn-continue" title="Continuar Comprando" type="button"><span>Continuar comprando</span></button>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      $total = 0;
                      foreach ($_SESSION['carrito'] as $key => $producto) {
                      ?>
                        <tr class="first odd" rowId="<?php echo $producto['id']; ?>">
                          <input type="hidden" id="txt_id" value="<?php echo $producto['id']; ?>">
                          <td class="image"><a class="product-image" title="" href="detalle_producto?codigo=<?php echo $producto['codigo']; ?>"><img width="75" alt="ThinkPad Ultrabook" src="images/productos/<?php echo $producto['foto']; ?>"></a></td>
                          <td>
                            <h2 class="product-name"> <a href="detalle_producto?codigo=<?php echo $producto['codigo']; ?>"><?php echo $producto['codigo']; ?></a> </h2>
                          </td>
                          <td class="a-center"><a title="Edit item parameters" class="edit-bnt" href="#configure/id/15945/"></a></td>
                          <td class="a-right"><span class="cart-price"> <span class="price">S/. <strong id="txt_precio"><?php echo $producto['precio']; ?></strong></span> </span></td>
                          <td class="a-center movewishlist">
                            <input type="number" id="txt_cantidad_<?php echo $producto['id']; ?>" name="txt_cantidad" min="1" max="99" minlength="1" maxlength="2" onchange="items_helper.calcularImporte(<?php echo $producto['id']; ?>,<?php echo $producto['precio']; ?>,this.value);" class="input-text qty" title="Cantidad" size="2" value="<?php echo $producto['cantidad']; ?>">
                          </td>
                          <td class="a-right movewishlist">
                            <span class="price">S/. <strong id="txt_total_<?php echo $producto['id']; ?>">
                                <?php echo number_format($producto['precio'] * $producto['cantidad'], 2); ?>
                              </strong>
                            </span>
                          </td>
                          <td class="a-center last"><a class="delete-cart button remove-item" title="Eliminar item" href="javascript:void(0)"><span><span>Eliminar item</span></span></a></td>
                        </tr>
                      <?php
                        $total = $total + ($producto['precio'] * $producto['cantidad']);
                      }
                      ?>
                    </tbody>
                  </table>
                </fieldset>
                <!-- </form> -->
              </div>
              <div class="cart-collaterals row">
                <div class="col-sm-4">

                </div>
                <div class="col-sm-4">

                </div>
                <div class="col-sm-4">
                  <div class="totals">
                    <!-- <h3>Mo</h3> -->
                    <div class="inner">
                      <table class="table shopping-cart-table-total" id="shopping-cart-totals-table">
                        <colgroup>
                          <col>
                          <col width="1">
                        </colgroup>
                        <tfoot>
                          <tr>
                            <td colspan="1" class="a-left"><strong style="font-size: 1.5em;">Total</strong></td>
                            <td class="a-right"><strong class="price">S/.<span id="txtTotal"><?php echo number_format($total, 2); ?></span></strong></td>
                          </tr>
                        </tfoot>
                        <!-- <tbody>
                          <tr>
                            <td colspan="1" class="a-left" > Subtotal </td>
                            <td class="a-right"><span class="price">S/.<span><?php //echo number_format($total, 2); 
                                                                              ?></span></span></td>
                          </tr>
                        </tbody> -->
                      </table>
                      <ul class="checkout">
                        <li>
                          <?php if (!isset($_SESSION['active'])) { ?>
                            <button class="button btn-proceed-checkout" onclick="window.location.href = 'login';" title="Proceed to Checkout" type="button"><span>Comprar</span></button>
                          <?php } else { ?>
                            <button class="button btn-proceed-checkout" onclick="window.location.href = 'proceso_compra';" title="Proceed to Checkout" type="button"><span>Comprar</span></button>
                          <?php } ?>
                        </li>
                        <!-- <br>
                        <li><a title="Checkout with Multiple Addresses" href="multiple_addresses.html">Checkout with Multiple Addresses</a> </li>
                        <br> -->
                      </ul>
                    </div>
                    <!--inner-->
                  </div>

                </div>
              </div>
            <?php } else { ?>
              <div class="alert alert-info">
                <div class="text-center">
                  <strong style="font-size: 1.6rem;">No hay productos en el carrito.</strong>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </section>

    <?php include_once 'includes/footer.php'; ?>
  </div>
  <!-- End Footer -->
  <?php include_once 'includes/menu_mobile.php'; ?>

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/revslider.js"></script>
  <script type="text/javascript" src="js/common.js"></script>

  <script type="text/javascript" src="js/owl.carousel.min.js"></script>
  <script type="text/javascript" src="js/jquery.mobile-menu.min.js"></script>
  <script type="text/javascript" src="js/funciones.js"></script>
</body>

</html>