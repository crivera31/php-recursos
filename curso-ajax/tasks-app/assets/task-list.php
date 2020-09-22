<?php
    require_once '../database.php';
    
    $query = "SELECT * FROM task";
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

    $jsonstring = json_encode($json);//el json esta convertido en string
    echo $jsonstring;
?>