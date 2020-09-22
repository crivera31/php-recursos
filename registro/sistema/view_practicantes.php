<?php
session_start();
if (empty($_SESSION['active'])) {
  header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'includes/head.php'; ?>
</head>

<body>
  <div id="wrapper">
    <?php include_once 'includes/nav.php'; ?>
    <div id="page-wrapper" class="gray-bg">
      <div class="row border-bottom">
        <?php include_once 'includes/menu.php'; ?>
      </div>
      <div class="wrapper wrapper-content">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox ">
              <div class="ibox-title">
                <h5>Listado de Practicantes</h5>
              </div>
              <div class="ibox-content">
                <div class="float-md-right">
                  <div class="d-flex justify-content-between align-items mb-3 ">
                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ModalRegPract"
                      data-backdrop="static" data-keyboard="false"><i class="fa fa-plus"></i> Registrar</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table id="tbl_practicante" class="table table-striped table-bordered table-hover dataTables-example">
                    <thead>
                      <tr id="cabecera">
                        <th style="width: 60px;">#</th>
                        <th style="width: 160px;">Nombres</th>
                        <th style="width: 160px;">Apellido Paterno</th>
                        <th style="width: 160px;">Apellido Materno</th>
                        <th style="width: 80px;"></th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer">
        <div>
          <strong>Copyright</strong> Example Company &copy; 2019
        </div>
      </div>
    </div>
  </div>
  <?php include_once 'modals/reg_practicante.php'; ?>
  <?php include_once 'modals/info_practicante.php'; ?>
  <?php include_once 'includes/script.php'; ?>
  <script>
  $(document).ready(function() {
    // $('.dataTables-example').DataTable({
    // dom: '<"html5buttons"B>lTfgitp',
    // buttons: [{
    //     extend: 'copy'
    //   },
    //   {
    //     extend: 'csv'
    //   },
    //   {
    //     extend: 'excel',
    //     title: 'ExampleFile'
    //   },
    //   {
    //     extend: 'pdf',
    //     title: 'ExampleFile'
    //   }
    // {
    //   extend: 'print',
    //   customize: function(win) {
    //     $(win.document.body).addClass('white-bg');
    //     $(win.document.body).css('font-size', '10px');

    //     $(win.document.body).find('table')
    //       .addClass('compact')
    //       .css('font-size', 'inherit');
    //   }
    // }
    // ]
    // });

  });
  </script>
</body>

</html>