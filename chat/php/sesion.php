<?php
	include_once('config.php');
	$_SESSION['sesionName'] = uniqid();
	echo $_SESSION['sesionName'];
?>