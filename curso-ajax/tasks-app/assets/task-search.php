<?php
    require_once '../database.php';

    $search = $_POST['search'];

    if (!empty($search)) {
        $query = "SELECT * FROM task WHERE nombre like '$search%' ";
        $result = mysqli_query($conn,$query);

        if (!$result) {
            die('Query Error' .mysqli_error($conn));
        }

        $json = array();
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'id' => $row['id'],
                'name' => $row['nombre'],
                'description' => $row['descripcion']
            );
        }
        $jsonstring = json_encode($json);
        echo $jsonstring;
    }
?>