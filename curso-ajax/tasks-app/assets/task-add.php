<?php
    require_once '../database.php';

    if (isset($_POST['name'])) {
        $nombre = $_POST['name'];
        $descripcion = $_POST['description'];
        $query = "INSERT INTO task(nombre,descripcion) VALUES ('$nombre','$descripcion')";
        $result = mysqli_query($conn,$query);

        if (!$result) {
            die('Query Error' .mysqli_error($conn));
        } else {
            echo 'Success!!!';
        }
    }
?>