<?php
	include_once('php/config.php');
	include_once('php/device.php');
	include_once('php/send.php');
	$class = new Send;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chat Online</title>
	<meta charset="UTF-8">
	<?php 
		if($tablet_browser > 0){
		    echo '<link rel="stylesheet" type="text/css" href="'.URL_BASE.'css/stylesMobile.css">';
		}else if($mobile_browser > 0){
			echo '<link rel="stylesheet" type="text/css" href="'.URL_BASE.'css/stylesMobile.css">';
		}else{
		    echo '<link rel="stylesheet" type="text/css" href="'.URL_BASE.'css/styles.css">';
		}
	?>
	<script type="text/javascript">
		var urlPort = '<?=SOCKET_FRONTEND;?>';
	</script>
	<script src="<?=URL_BASE;?>js/jquery.js" type="text/javascript"></script>
	<script src="<?=URL_BASE;?>js/fancywebsocket.js"></script>
	<script src="<?=URL_BASE;?>js/myjava.js" type="text/javascript"></script>
</head>
<body>
	<div id="wrapper">
		<div id="header">
			Bienvenido <span id="userName" style="color:#424242;"></span>
		</div>
		
		<div id="content">
			<ul id="containerMessages"><?=$class->load_messages();?></ul>
		</div>
		
		<div id="footer">
			<form id="formChat" type="name">
				<table>
					<tr>
						<td width="90%"><input type="text" placeholder="¿Cual es tu nombre?" id="name" autofocus autocomplete="off"></td>
						<td><input type="submit" value="Ingresar" id="submit"></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<script type="text/javascript">
		var height = $('body').prop('scrollHeight');
		$('html, body').animate({scrollTop: height}, 600);
	</script>
</body>
</html>