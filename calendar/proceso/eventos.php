<?php
  require_once 'class_conexion.php';
  $db = new conexionDB();
  $conn = $db->getConexion();

$accion = (isset($_GET['accion'])) ? $_GET['accion'] : 'leer';
switch ($accion) {
  case 'agregar':
    $verificar = false;
    try {
      $query = "INSERT INTO eventos(title,descripcion,color,textcolor,hora,f_start,f_end) 
                VALUES(:title,:descripcion,:color,:textColor,:hora,:f_start,:f_end)";
      $data = $conn->prepare($query);
      $data->bindParam(':title', $_POST['title']);
      $data->bindParam(':descripcion', $_POST['descripcion']);
      $data->bindParam(':color', $_POST['color']);
      $data->bindParam(':textColor', $_POST['textColor']);
      $data->bindParam(':hora', $_POST['hora']);
      $data->bindParam(':f_start', date("Y-m-d", strtotime($_POST['start'])));
      $data->bindParam(':f_end', date("Y-m-d", strtotime($_POST['end'])));
      $data->execute();
    } catch (PDOException $e) {
      die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
    }

    if ($data) {
      $verificar = true;
    } else {
      $verificar = false;
    }
    echo json_encode($verificar);
    break;
  case 'modificar':
    $verificar = false;
    try {
      $query = "UPDATE eventos set title = :title,descripcion = :descripcion,color = :color,textColor = :textColor,
              hora = :hora, f_start = :f_start,f_end = :f_end WHERE id = :id";
      $data = $conn->prepare($query);
      $data->bindParam(':id', $_POST['id']);
      $data->bindParam(':title', $_POST['title']);
      $data->bindParam(':descripcion', $_POST['descripcion']);
      $data->bindParam(':color', $_POST['color']);
      $data->bindParam(':textColor', $_POST['textColor']);
      $data->bindParam(':hora', $_POST['hora']);
      $data->bindParam(':f_start', date("Y-m-d", strtotime($_POST['start'])));
      $data->bindParam(':f_end', date("Y-m-d", strtotime($_POST['end'])));
      $data->execute();
    } catch (PDOException $e) {
      die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
    }

    if ($data) {
      $verificar = true;
    } else {
      $verificar = false;
    }
    echo json_encode($verificar);
    break;
  case 'eliminar':
    $verificar = false;
    if (isset($_POST['id'])) {
      try {
        $query = "DELETE FROM eventos WHERE id = :id";
        $data = $conn->prepare($query);
        $data->bindParam(':id', $_POST['id']);
        $data->execute();
      } catch (PDOException $e) {
        die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
      }

      if ($data) {
        $verificar = true;
      } else {
        $verificar = false;
      }
      echo json_encode($verificar);
    }
    break;
  default:
    try {
      $query = "SELECT * FROM eventos";
      $data = $conn->query($query);
      $data->execute();
    } catch (PDOException $e) {
      die("¡Error!: " . $e->getMessage() . " Archivo: " . $e->getFile() . " Linea: " . $e->getLine());
    }
    $fila = $data->fetchAll(PDO::FETCH_ASSOC);
    $json = array();
    foreach ($fila as $row) {
      $json[] = array(
        'id' => $row['id'],
        'title' => $row['title'],
        'descripcion' => $row['descripcion'],
        'color' => $row['color'],
        'textColor' => $row['textColor'],
        'hora' => $row['hora'],
        'start' => $row['f_start'],
        'end' => $row['f_end']
      );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
    break;
}

?>