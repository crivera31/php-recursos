<?php 
	session_start();
    require_once '../class/Grado.php';
    $cl_grado = new Grado();

    $id_director = $_SESSION['IdDirector'];

    $result = $cl_grado->Add_grado_a_docentes($id_director);

    $json = array();
    foreach ($result as $row) {
        $json[] = array(
        // 'id' => $row['IdGrado'],
        'nombre' => $row['nombre']
        );
    }
    $jsonstring = json_encode($json); ////codificar el primer elemento del array
    echo $jsonstring;
?>