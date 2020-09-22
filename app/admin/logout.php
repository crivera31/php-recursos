<?php
session_start();
// session_destroy();
unset($_SESSION['panel']);
header('location: index.php');

?>