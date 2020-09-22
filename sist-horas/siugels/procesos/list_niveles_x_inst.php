<?php
session_start();
require_once '../class/Colegio.php';
//en el combobox
$cl_colegio = new Colegio();

$id_director = $_SESSION['directorID'];
$cl_colegio->setDirectorID($id_director);

$result = $cl_colegio->View_nivel_x_institucion();

$mis_niveles = $cl_colegio->getNiveles();

echo $mis_niveles;

?>