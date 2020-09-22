<fieldset class="group-select">
    <ul>
        <li>
            <div class="customer-name">
                <div class="input-box name-firstname">
                    <label for=""><strong>Nombres</strong></label>
                    <br>
                    <input type="text" id="names" name="names" value="<?php echo $cl_pedido->getNombres(); ?>" title="" class="input-text" disabled>
                </div>
                <div class="input-box name-lastname">
                    <label for=""> <strong>Apellidos</strong> </label>
                    <br>
                    <input type="text" id="a_paterno" name="a_paterno" value="<?php echo $cl_pedido->getApellidos(); ?>" title="" class="input-text" disabled>
                </div>
            </div>
        </li>
        <br>
        <li>
            <div class="input-box">
                <label for=""><strong>Fecha y Hora</strong></label>
                <br>
                <input type="text" id="fecha-hora" name="fec-hora" value="<?php echo date("d/m/Y", strtotime($cl_pedido->getFecha())) . ' ' . date("h:i:s a ", strtotime($cl_pedido->getHora())); ?>" title="" class="input-text" disabled>
            </div>
            <div class="input-box">
                <label for=""><strong>Celular</strong> </label>
                <br>
                <input type="text" name="celular" id="celular" value="<?php echo $cl_pedido->getCelular(); ?>" title="" class="input-text validate-email" disabled>
            </div>
        </li>
        <br>
        <li>
            <div class="customer-name">
                <div class="input-box name-firstname">
                    <label for=""><strong>DNI</strong></label>
                    <br>
                    <input type="text" id="dni" name="dni" value="<?php echo $cl_pedido->getDni(); ?>" title="" class="input-text" disabled>
                </div>
                <div class="input-box name-lastname">
                    <label for=""><strong>Correo</strong></label>
                    <br>
                    <input type="email" title="" name="correo" id="correo" value="<?php echo $cl_pedido->getCorreo(); ?>" class="input-text required-entry" disabled>
                </div>
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
            <input type="text" title="" name="ubicacion" id="ubicacion" value="<?php echo $cl_pedido->getUbicacion(); ?>" class="input-text required-entry" disabled>
        </li>
        <br>
        <li>
            <label for=""><strong>Direccion</strong></label>
            <br>
            <input type="text" title="" name="direccion" id="direccion" value="<?php echo $cl_pedido->getDireccion(); ?>" class="input-text required-entry" disabled>
        </li>
        <br>
        <li>
            <label for=""><strong>Referencia</strong></label>
            <br>
            <input type="text" title="" name="direccion" id="direccion" value="<?php echo $cl_pedido->getReferencia(); ?>" class="input-text required-entry" disabled>
        </li>
    </ul>
    <br>
    <div class="buttons-set">
    </div>
</fieldset>