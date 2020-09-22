<?php
session_start();
if (empty($_SESSION['active'])) {
  header('location: ../index.php');
}
require_once 'class/Nivel.php';
$cl_nivel = new Nivel();

// print_r ($_SESSION);
?>
<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <title> SIUGELS</title>
  <?php include 'includes/script-head.php'; ?>
</head>

<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns  fixed-navbar">
  <!-- navbar-fixed-top-->
  <?php include 'includes/navbar.php'; ?>
  <!-- fin navbar-->

  <!-- main menu-->
  <?php include 'includes/main-menu.php'; ?>
  <!-- / main menu-->

  <div class="app-content content container-fluid">
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <!-- stats -->
        <div class="row">
          <!-- col-md-6 offset-md-3 -->
          <div class="col-md-10 offset-sm-1">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title" id="basic-layout-card-center">Agregar Institución</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              </div>
              <div class="card-body collapse in">
                <div class="card-block">
                  <div id="mensaje1">
                  </div>
                  <form class="form" id="formInst">
                    <div class="form-body">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="eventRegInput1">Nombre</label>
                            <input type="text" class="form-control" placeholder="Nombre" name="n_inst" id="n_inst" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="eventRegInput2">Dirección</label>
                            <input type="text" class="form-control" placeholder="Av. Example Mz-E Lte-10" name="d_inst" id="d_inst" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="eventRegInput2">Referencia</label>
                            <input type="text" class="form-control" placeholder="Frente al parque" name="r_inst" id="r_inst" required>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="issueinput5">Departamento</label>
                            <select id="departamento" name="departamento" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="" data-original-title="" title="" required>
                              <option value="" selected disabled></option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="issueinput5">Provincia</label>
                            <select id="provincia" name="provincia" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="" data-original-title="" title="" required>

                            </select>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="issueinput5">Distrito</label>
                            <select id="distrito" name="distrito" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="" data-original-title="" title="" required>

                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="eventRegInput1">Teléfono</label>
                            <input type="text" class="numeros form-control" placeholder="Teléfono" name="t_inst" id="t_inst" maxlength="9" required>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Niveles</label>
                            <div class="input-group">
                              <?php $result = $cl_nivel->View_niveles();
                              foreach ($result as $row) {
                                ?>
                                <label class="display-inline-block custom-control custom-radio ml-1">
                                  <input type="checkbox" name="niveles[]" id="niveles[]" value="<?php echo $row['nombre']; ?>" class="custom-control-input">
                                  <span class="custom-control-indicator"></span>
                                  <span class="custom-control-description ml-0"><?php echo $row['nombre']; ?></span>
                                </label>
                              <?php
                              }
                              ?>
                            </div>
                          </div>
                        </div>
                        
                      </div>

                    </div>
                    <div class="form-actions center">
                      <button type="submit" class="btn btn-info">Guardar
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xs-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"></h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
              </div>
              <div class="card-body collapse in">
                <div class="card-block card-dashboard">
                  <div class="">
                    <!--table-responsive-->
                    <table class="table mb-0" id="tblInst">
                      <thead class="thead-default">
                        <tr id="cabecera">
                          <th>#</th>
                          <th>Nombre</th>
                          <th>Dirección</th>
                          <th>Niveles</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody id="tbl_inst">

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--/ stats -->
      </div>
    </div>
  </div>
  <!-- fin contenido-->
  <!-- footer -->
  <?php //include 'includes/footer.php'; 
  ?>
  <!-- fin footer -->
  <!-- edit institucion Modal HTML -->
  <?php include_once('modals/info_institucion.php'); ?>
  <!-- secciones Modal HTML -->
  <?php include_once('modals/ver_secciones.php'); ?>

  <?php include 'includes/script-body.php'; ?>

</body>

</html>