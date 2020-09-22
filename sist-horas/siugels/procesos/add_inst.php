<?php
	session_start();
	require_once '../class/Colegio.php';
	require_once '../class/distritos.php';

	$cl_colegio = new Colegio();
	$cl_distrito = new Distrito();

	
  $nombre = filter_input(INPUT_POST, 'n_inst');
  $direccion = filter_input(INPUT_POST, 'd_inst');
	$referencia = filter_input(INPUT_POST, 'r_inst');
	$telefono = filter_input(INPUT_POST, 't_inst');
  $id_director = $_SESSION['IdDirector'];
  $id_distrito = filter_input(INPUT_POST, 'distrito');

	if (trim($nombre) == '' || trim($direccion) == '' || trim($referencia) == '') {
		echo 'llenar_campos';
	} else {

	// $niveles = isset($_POST['niveles']) ? $_POST['niveles'] : null;
	if (isset($_POST['niveles'])) {
		$niveles = $_POST['niveles'];

		$arrayNiveles = null;

		$num_array = count($niveles);
		$contador = 0;

		if ($num_array > 0) {
			foreach ($niveles as $key => $value) {
				if ($contador != $num_array - 1)
					$arrayNiveles .= $value . '-';
				else
					$arrayNiveles .= $value;
				$contador++;
			}
		}

		$cl_colegio->setNombre($nombre);
		$cl_colegio->setDireccion($direccion);
		$cl_colegio->setReferencia($referencia);
		$cl_colegio->setNiveles($arrayNiveles);
		$cl_colegio->setTelefono($telefono);
		$cl_colegio->setDistritoID($id_distrito);
		$cl_colegio->setDirectorID($id_director);

		$validar = $cl_colegio->Validar_una_inst_x_director();

		if ($validar) {
			echo 'existe';
		} else {
			$result = $cl_colegio->Add_institucion();

			if ($result) {
				echo 'agregado';
			} else {
				echo 'error';
			}
		}
	} else {
		echo 'falta_niveles';
	} 
}
?>