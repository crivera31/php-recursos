<?php
    require_once '../database.php';
    
    if (isset($_POST['id'])) { //si existe
        $id = $_POST['id'];
        $query = "DELETE FROM task WHERE id = $id ";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die('query failed!');
        }
        echo 'task deleted';
    }
?>