<fieldset class="group-select">
    <ul>
        <li>
            <div class="customer-name">
                <div class="input-box name-firstname">
                    <label for=""><strong>Nombres Comercial</strong></label>
                    <br>
                    <input type="text" id="comercial" name="comercial" value="<?php echo $cl_pedido->getComercial(); ?>" class="input-text" disabled>
                </div>
                <div class="input-box name-lastname">
                    <label for=""> <strong>Razon Social</strong> </label>
                    <br>
                    <input type="text" id="razon" name="razon" value="<?php echo $cl_pedido->getRazon(); ?>" class="input-text" disabled>
                </div>
            </div>
        </li>
        <br>
        <li>
            <div class="input-box">
                <label for=""><strong>Ruc</strong> </label>
                <br>
                <input type="text" name="ruc" id="ruc" value="<?php echo $cl_pedido->getRuc(); ?>" class="input-text validate-email" disabled>
            </div>
            <div class="input-box">
                <label for=""><strong>Fecha y Hora</strong></label>
                <br>
                <input type="text" id="fecha-hora" name="fec-hora" value="<?php echo date("d/m/Y", strtotime($cl_pedido->getFecha())) . ' ' . date("h:i:s a ", strtotime($cl_pedido->getHora())); ?>" class="input-text" disabled>
            </div>
        </li>
        <br>
        <div class="page-title">
            <h2>Dirección de envío</h2>
        </div>
        <br>
        <li>
            <label for=""><strong>Departamento/Provincia/Distrito</strong></label>
            <br>
            <input type="text" name="ubicacion" id="ubicacion" value="<?php echo $cl_pedido->getUbicacion(); ?>" class="input-text required-entry" disabled>
        </li>
        <br>
        <li>
            <label for=""><strong>Direccion</strong></label>
            <br>
            <input type="text" name="direccion" id="direccion" value="<?php echo $cl_pedido->getDireccion(); ?>" class="input-text required-entry" disabled>
        </li>
        <br>
        <li>
            <label for=""><strong>Referencia</strong></label>
            <br>
            <input type="text" name="referencia" id="referencia" value="<?php echo $cl_pedido->getReferencia(); ?>" class="input-text required-entry" disabled>
        </li>
    </ul>
    <br>
    <div class="buttons-set">
    </div>
</fieldset>