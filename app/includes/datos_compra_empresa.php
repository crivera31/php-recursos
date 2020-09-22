<section class="col-sm-9 wow bounceInUp animated">
  <div class="col-main">
    <div class="page-title">
      <h1>PROCESO DE COMPRA empresa</h1>
    </div>
    <div class="static-contain">
      <form id="form-procesarPedidoEmpresa" action="/confirmacion2.php" method="POST">
        <fieldset class="group-select">
          <ul>
            <li>
              <div class="customer-name">
                <div class="input-box name-firstname">
                  <label for="">Nombre Comercial</label>
                  <br>
                  <input type="text" id="pro_nombres" name="pro_nombres" value="<?php echo $cl_cliente->getNombre_comercial(); ?>" title="" class="input-text" disabled>
                </div>
                <div class="input-box name-lastname">
                  <label for=""> Razon Social </label>
                  <br>
                  <input type="text" id="pro_apellidos" name="pro_apellidos" value="<?php echo $cl_cliente->getRazon_social(); ?>" title="" class="input-text" disabled>
                </div>
              </div>
            </li>
            <br>
            <li>
              <div class="input-box">
                <label for="">Ruc</label>
                <br>
                <input type="email" id="pro_correo" name="pro_correo" value="<?php echo $cl_cliente->getRuc(); ?>" title="" class="input-text" disabled>
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
                <label for="">Titular de la empresa</label>
                <br>
                <input type="text" id="pro_dni" name="pro_dni" value="<?php echo $cl_cliente->getNombre_titular() . ' ' . $cl_cliente->getApellido_titular(); ?>" title="" class="input-text" disabled>
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
                <input type="text" placeholder="Ingrese dirección para el envío" name="empresa_direccion" id="empresa_direccion" class="input-text required-entry" value="<?php echo $cl_cliente->getDireccion(); ?>" required>
              </div>
              <div class="input-box">
                <label for="">Departamento/Provincia/Distrito </label>
                <br>
                <input type="text" placeholder="Ingrese dirección para el envío" name="empresa_ubicacion" id="empresa_ubicacion" class="input-text required-entry" value="<?php echo $cl_cliente->getUbicacion(); ?>" required>
              </div>
            </li>
            <br>
            <li>
              <div class="input-box name-lastname">
                <label for="">Referencia </label>
                <br>
                <input type="text" placeholder="Ingrese dirección para el envío" name="empresa_referencia" id="empresa_referencia" class="input-text required-entry">
              </div>
            </li>
          </ul>
          <br>
          <!-- <input type="text" name="hideit" id="hideit" value="" style="display:none !important;"> -->
          <div class="buttons-set">
            <!-- <button type="submit" title="" class="procesar_pedido button continue"> <span> Confirmar pedido </span> </button> -->
          </div>
        </fieldset>
        <input type="hidden" name="amount" value="<?php echo $total; ?>">
        <input type="hidden" name="label" value="Tu Pedido">

        <script src="https://www.mercadopago.com.pe/integrations/v1/web-tokenize-checkout.js" data-public-key="TEST-6b424a2d-7904-4a3b-9ac6-aa518e03f639" data-transaction-amount="<?php echo $total; ?>" data-summary-product="<?php echo $total; ?>" data-summary-shipping="<?php echo $ship; ?>" data-summary-product-label="<?php echo $title; ?>">
        </script>
      </form>
    </div>
  </div>
</section>