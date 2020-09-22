<?php
    require_once '../database.php';

        $id = $_POST['id'];
        $query = "SELECT * FROM task WHERE id = $id ";
        $result = mysqli_query($conn, $query);

        $json = array();
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'id' => $row['id'],
                'name' => $row['nombre'],
                'description' => $row['descripcion']
            );
        }
        $jsonstring = json_encode($json[0]);//el json esta convertido en string
    echo $jsonstring;
