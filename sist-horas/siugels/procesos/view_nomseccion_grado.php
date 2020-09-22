<?php 
	session_start();
    require_once '../class/Grado.php';
    $cl_grado = new Grado();

    $id_director = $_SESSION['IdDirector'];

    $nom_seccion = $_POST['SeccionNom'];

    $cl_grado->setNom_seccion($nom_seccion);
    $result = $cl_grado->View_nomSeccion_x_grado($id_director);

    $json = array();
    foreach ($result as $row) {
        $json[] = array(
        // 'id' => $row['IdGrado'],
        'nombre' => $row['nom_seccion']
        );
    }
    $jsonstring = json_encode($json); ////codificar el primer elemento del array
    echo $jsonstring;
?>