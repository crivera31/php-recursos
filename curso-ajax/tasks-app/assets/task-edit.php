<?php
    require_once '../database.php';
        
        $name = $_POST['name'];
        $description = $_POST['description'];
        $id = $_POST['id'];

        $query = "UPDATE task SET nombre = '$name', descripcion = '$description' WHERE id = '$id' ";
        $result = mysqli_query($conn, $query);
        // echo $query;
        if (!$result) {
            die('query failed!');
        }
        echo 'edit success';
?>