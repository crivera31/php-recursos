<?php

$filename=$_FILES["foto"]["name"];

$tmp = explode('.', $filename);
$file_extension = end($tmp);

echo $filename;
echo '<br>';
echo $file_extension;
$newfilename='otro' .".".$file_extension;
echo '<br>';
echo $newfilename;


$ruta = 'img/';
$archivo = $ruta . $newfilename;
    $guardar = @move_uploaded_file($_FILES["foto"]["tmp_name"], $archivo);
    if ($guardar) {
      echo "Archivo Guardado";
    } else {
      echo "error_guardar";
    }