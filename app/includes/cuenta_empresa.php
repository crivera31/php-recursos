<section class="col-sm-9 wow bounceInUp animated">
  <div class="col-main">
    <div class="static-contain">
      <!-- <div id="msj_registro">
      <div class="alert alert-success" role="alert"><strong>Datos Actualizados.</strong></div>
      </div> -->
      <form id="form-updateProfileEmpresa">
        <fieldset class="group-select">
          <ul>
            <li>
              <div class="customer-name">
                <div class="input-box name-firstname">
                  <label for=""><strong>Razon Social</strong></label>
                  <br>
                  <input type="text" id="razon" name="razon" value="<?php echo $cl_cliente->getRazon_social(); ?>" title="" class="input-text" disabled>
                </div>
                <div class="input-box name-lastname">
                  <label for=""> <strong>Nombre Comercial</strong> </label>
                  <br>
                  <input type="text" id="nom_comercial" name="nom_comercial" value="<?php echo $cl_cliente->getNombre_comercial(); ?>" title="" class="input-text" disabled>
                </div>
              </div>
            </li>
            <br>
            <li>
              <div class="input-box">
                <label for=""><strong>Ruc</strong></label>
                <br>
                <input type="text" id="ruc" name="ruc" value="<?php echo $cl_cliente->getRuc(); ?>" title="" class="input-text" disabled>
              </div>
              <div class="input-box">
                <label for=""><strong>Correo</strong></label>
                <br>
                <input type="email" title="" name="correo" id="correo" value="<?php echo $cl_cliente->getCorreo(); ?>" class="input-text required-entry" disabled>
              </div>
            </li>
            <br>
            <li>
              <div class="input-box">
                <label for=""><strong>Dirección</strong> </label>
                <br>
                <input type="text" name="direccion" id="direccion" value="<?php echo $cl_cliente->getDireccion(); ?>" title="" class="input-text validate-email" disabled>
              </div>
              <div class="input-box">
                <label for=""><strong>Departamento/Provincia/Distrito</strong> </label>
                <br>
                <input type="text" name="ubicacion" id="ubicacion" value="<?php echo $cl_cliente->getUbicacion(); ?>" title="" class="input-text validate-email" disabled>
              </div>
            </li>
            <br>
            <li>
              <div class="input-box">
                <label for=""><strong>Nombre del Titular de la empresa</strong> </label>
                <br>
                <input type="text" name="titular" id="titular" value="<?php echo $cl_cliente->getNombre_titular(); ?>" title="" class="input-text validate-email" disabled>
              </div>
              <div class="input-box">
                <label for=""><strong>Apellido del Titular de la empresa</strong></label>
                <br>
                <input type="text" name="apellido" id="apellido" value="<?php echo $cl_cliente->getApellido_titular(); ?>" title="" class="input-text validate-email" disabled>
              </div>
            </li>
            <br>
            <div class="page-title">
              <h2>Datos de contacto</h2>
            </div>
            <br>
            <li>
              <div class="customer-name">
                <div class="input-box name-firstname">
                  <label for=""><strong>Nombres</strong></label>
                  <br>
                  <input type="text" id="nombre_c" name="nombre_c" onkeypress="return soloLetras(event)" value="<?php echo $cl_cliente->getNombres(); ?>" title="" class="input-text">
                </div>
                <div class="input-box name-lastname">
                  <label for=""> <strong>Apellido Paterno</strong> </label>
                  <br>
                  <input type="text" id="c_paterno" name="c_paterno" onkeypress="return soloLetras(event)" value="<?php echo $cl_cliente->getApe_paterno(); ?>" title="" class="input-text" >
                </div>
              </div>
            </li>
            <br>
            <li>
              <div class="customer-name">
                <div class="input-box name-firstname">
                  <label for=""><strong>Apellido Materno</strong></label>
                  <br>
                  <input type="text" id="c_materno" name="c_materno" onkeypress="return soloLetras(event)" value="<?php echo $cl_cliente->getApe_materno(); ?>" title="" class="input-text" >
                </div>
                <div class="input-box name-lastname">
                  <label for=""> <strong>Dni</strong> </label>
                  <br>
                  <input type="text" id="c_dni" name="c_dni" maxlength="8" value="<?php echo $cl_cliente->getDni(); ?>" title="" class="numeros input-text" >
                </div>
              </div>
            </li>
            <br>
            <li>
              <div class="customer-name">
                <div class="input-box name-firstname">
                  <label for=""><strong>Celular</strong></label>
                  <br>
                  <input type="text" maxlength="9" id="c_celular" name="c_celular" value="<?php echo $cl_cliente->getContacto_celular(); ?>" title="" class="numeros input-text" >
                </div>
                <div class="input-box name-lastname">
                  <label for=""> <strong>Correo</strong> </label>
                  <br>
                  <input type="text" id="c_correo" name="c_correo" value="<?php echo $cl_cliente->getContacto_correo(); ?>" title="" class="input-text" >
                </div>
              </div>
            </li>
            <br>
            <li>
              <div class="customer-name">
                <div class="input-box name-firstname">
                  <label for=""><strong>Cargo</strong></label>
                  <br>
                  <input type="text" id="c_cargo" name="c_cargo" value="<?php echo $cl_cliente->getContacto_cargo(); ?>" title="" class="input-text" >
                </div>
                <div class="input-box">
                <label for=""><strong>Cambiar contraseña</strong></label>
                <br>
                <input type="password" id="pass" name="pass" value="" title="" class="input-text">
              </div>
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