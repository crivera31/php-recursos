<?php
$nameFile = $_FILES["file"]["name"];
// $id_producto = $_POST['producto_id'];

$permitidos = array("image/png");

if(in_array($_FILES['file']["type"], $permitidos)){

    $ruta = '../../images/productos/';
    $archivo = $ruta.$_FILES["file"]["name"];

    if (file_exists($archivo)) {
        /**eliminalo la foto actual */
        unlink($archivo);
        $resultado = @move_uploaded_file($_FILES["file"]["tmp_name"], $archivo);
        /**guarada la foto */
        if ($resultado) {
            echo 'success';
        } else {
            echo "error_save2";
        }
    } else {
        $resultado = @move_uploaded_file($_FILES["file"]["tmp_name"], $archivo);
        /**guarada la foto */
        if ($resultado) {
            echo 'success';
        } else {
            echo "error_save1";
        }
    }
} else {
    echo "error_extension"; /**Archivo no pertenece a la extensión */
}


?>