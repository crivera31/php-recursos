<?php
session_start();
require_once '../class/conexionDB.php';
function Count_practicantes()
{
    $db = new conexionDB();
    $conn = $db->getConexion();

    try {
        $query = "SELECT count(*) FROM practicante";
        $data = $conn->query($query);
        $data->execute();
    } catch (PDOException $e) {
        echo "¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine();
    }

    $row_count = $data->fetchColumn();

    $conn = null;
    return $row_count;
}

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
          <div class="col-lg-3">
            <div class="widget style1 navy-bg">
              <div class="row">
                <div class="col-4">
                  <i class="fa fa-users fa-5x"></i>
                </div>
                <div class="col-8 text-right">
                  <span> Practicantes </span>
                  <h2 class="font-bold"><?php echo Count_practicantes() ?></h2>
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
    <div id="right-sidebar">

    </div>
  </div>
  <?php include_once 'includes/script.php'; ?>

  <script>
  $(".select2_demo_1").select2({
    placeholder: "Select a state"    
  });
  $(".select2_demo_2").select2();
  $(".select2_demo_3").select2({
    placeholder: "Select a state",
    allowClear: true
  });
  </script>
</body>

</html>