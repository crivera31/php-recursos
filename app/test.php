<?php
$carpeta = "images/banners/slide/";
if (is_dir($carpeta)) {
  if ($dir = opendir($carpeta)) {
    while (($archivo = readdir($dir)) !== false) {
      if ($archivo != '.' && $archivo != '..' && $archivo != '.htaccess') {
        echo $archivo . '<br>';
      }
    }
    closedir($dir);
  }
}
?>