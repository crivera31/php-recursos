<section class="col-sm-9 wow bounceInUp animated">
  <div class="col-main">
    <div class="page-title">
      <h1>PROCESO DE COMPRA</h1>
    </div>
    <div class="static-contain">
      <form id="form-procesarPedido" action="/confirmacion.php" method="POST">
        <fieldset class="group-select">
          <ul>
            <li>
              <div class="customer-name">
                <div class="input-box name-firstname">
                  <label for="">Nombres</label>
                  <br>
                  <input type="text" id="pro_nombres" name="pro_nombres" value="<?php echo $cl_cliente->getNombres(); ?>" title="" class="input-text" disabled>
                </div>
                <div class="input-box name-lastname">
                  <label for=""> Apellidos </label>
                  <br>
                  <input type="text" id="pro_apellidos" name="pro_apellidos" value="<?php echo $cl_cliente->getApe_paterno() . ' ' .  $cl_cliente->getApe_materno(); ?>" title="" class="input-text" disabled>
                </div>
              </div>
            </li>
            <br>
            <li>
              <div class="input-box">
                <label for="">Correo</label>
                <br>
                <input type="email" id="pro_correo" name="pro_correo" value="<?php echo $cl_cliente->getCorreo(); ?>" title="" class="input-text" disabled>
              </div>
              <div class="input-box">
                <label for="">Celular</label>
                <br>
                <input type="text" id="pro_celular" name="pro_celular" value="<?php echo $cl_cliente->getCelular(); ?>" title="" class="input-text" disabled>
              </div>
            </li>
            <br>
            <li>
              <div class="input-box">
                <label for="">DNI</label>
                <br>
                <input type="text" id="pro_dni" name="pro_dni" value="<?php echo $cl_cliente->getDni(); ?>" title="" class="input-text" disabled>
              </div>
            </li>
            <br>
            <div class="page-title">
              <h2>Dirección de envío</h2>
            </div>
            <br>
            <li>
              <div class="input-box">
                <label for="">Dirección </label>
                <br>
                <input type="text" placeholder="Ingrese dirección para el envío" name="pro_direccion" id="pro_direccion" class="input-text required-entry" required>
              </div>
              <div class="input-box">
                <label for="">Referencia </label>
                <br>
                <input type="text" placeholder="Ingrese dirección para el envío" name="pro_referencia" id="pro_referencia" class="input-text required-entry">
              </div>
            </li>
            <br>
            <li>
              <div class="customer-name">
                <div class="input-box name-firstname">
                  <label for="">Departamento</label>
                  <br>
                  <select class="validate-select" id="departamento" name="departamento" style="width:90%;" required>
                    <option selected disabled>-- Seleccione --</option>
                  </select>
                </div>
                <div class="input-box name-lastname">
                  <label for="">Provincia</label>
                  <br>
                  <select class="validate-select" id="provincia" name="provincia" style="width:90%;" required>
                    <option value="" selected>-- Seleccione --</option>
                  </select>
                </div>
              </div>
            </li>
            <br>
            <li>
              <div class="input-box name-lastname">
                <label for="">Distrito</label>
                <br>
                <select class="validate-select" id="distrito" name="distrito" style="width:90%;" required>
                  <option value="" selected>-- Seleccione --</option>
                </select>
              </div>
            </li>
          </ul>
          <br>
          <div class="page-title">
            <h2>Método de pago</h2>
          </div>
          <label for="billing-address-select"><b>Mercado Pago</b></label><br>
          <label for="billing-address-select">Págalo con total seguridad con tu tarjeta de crédito o débito, Visa, Máster card.</label>
          <br><br>
          <!-- <input type="text" name="hideit" id="hideit" value="" style="display:none !important;"> -->
          <div class="buttons-set">
            <!-- <button type="submit" title="" class="procesar_pedido button continue"> <span> Confirmar pedido </span> </button> -->
          </div>
        </fieldset>
        <!-- </form> -->
        <!-- accion del pago -->
        <!-- <form action="procesar.php" method="POST" id="pay" name="pay"> -->
        <input type="hidden" name="amount" value="<?php echo $total; ?>">
        <input type="hidden" name="label" value="Tu Pedido">

        <script src="https://www.mercadopago.com.pe/integrations/v1/web-tokenize-checkout.js" data-public-key="TEST-6b424a2d-7904-4a3b-9ac6-aa518e03f639" data-transaction-amount="<?php echo $total; ?>" data-summary-product="<?php echo $total; ?>" data-summary-shipping="<?php echo $ship; ?>" data-summary-product-label="<?php echo $title; ?>">
        </script>

        <!-- <script src="https://www.mercadopago.com.pe/integrations/v1/web-tokenize-checkout.js" data-public-key="TEST-6b424a2d-7904-4a3b-9ac6-aa518e03f639" data-transaction-amount="10" data-summary-product="10" data-summary-shipping="0" data-summary-product-label="im peidio">
        </script> -->
      </form>
    </div>
  </div>
</section>