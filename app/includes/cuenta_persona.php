<section class="col-sm-9 wow bounceInUp animated">
  <div class="col-main">
    <div class="static-contain">
      <div id="msj_registro">
      </div>
      <form id="form-updateProfile">
        <fieldset class="group-select">
          <ul>
            <li>
              <div class="customer-name">
                <div class="input-box name-firstname">
                  <label for=""><strong>Nombres</strong></label>
                  <br>
                  <input type="text" id="names" name="names" onkeypress="return soloLetras(event)" value="<?php echo $cl_cliente->getNombres(); ?>" title="" class="input-text" required>
                </div>
                <div class="input-box name-lastname">
                  <label for=""> <strong>Apellido Paterno</strong> </label>
                  <br>
                  <input type="text" id="a_paterno" name="a_paterno" onkeypress="return soloLetras(event)" value="<?php echo $cl_cliente->getApe_paterno(); ?>" title="" class="input-text" required>
                </div>
              </div>
            </li>
            <br>
            <li>
              <div class="input-box">
                <label for=""><strong>Apellido Materno</strong></label>
                <br>
                <input type="text" id="a_materno" name="a_materno" onkeypress="return soloLetras(event)" value="<?php echo $cl_cliente->getApe_materno(); ?>" title="" class="input-text" required>
              </div>
              <div class="input-box">
                <label for=""><strong>Celular</strong> </label>
                <br>
                <input type="text" name="celular" id="celular" maxlength="9" value="<?php echo $cl_cliente->getCelular(); ?>" title="" class="numeros input-text validate-email" required>
              </div>
            </li>

            <li>
              <div class="input-box">
                <label for=""><strong>Correo</strong></label>
                <br>
                <input type="email" title="" name="correo" id="correo" value="<?php echo $cl_cliente->getCorreo(); ?>" class="input-text required-entry" required>
              </div>
              <div class="input-box">
                <label for=""><strong>DNI</strong> </label>
                <br>
                <input type="text" name="dni" id="dni" maxlength="8" value="<?php echo $cl_cliente->getDni(); ?>" title="" class="numeros input-text validate-email" required>
              </div>
            </li>
            <br>
            <li>
              <div class="input-box">
                <label for=""><strong>Cambiar contraseña</strong></label>
                <br>
                <input type="password" id="up-pass" name="up-pass" value="" title="" class="input-text">
              </div>
            </li>
          </ul>
          <br>
          <input type="hidden" name="id-profile" id="id-profile" value="<?php echo $cl_cliente->getId(); ?>">
          <div class="buttons-set">
            <button type="submit" title="" class="button submit"> <span> Guardar </span> </button>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</section>