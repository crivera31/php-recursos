<?php
	include_once('conexion.php');
	class Send extends Model{

		public function __construct(){ 
     	 	parent::__construct(); 
    	}

	    public function process($name, $message){
	    	$date = date('Y-m-d H:i:s');
	    	$sql = $this->db->query("INSERT INTO tbl_mensajes (mensaje_registro, mensaje_nombre, mensaje_mensaje, mensaje_sesion) VALUES ('$date', '$name', '$message', '".$_SESSION['sesionName']."')");
	    	if($sql){
	    		$dateTime = '<br><span>'.date('d M Y H:i:s', strtotime($date)).'<span>';
				$array = array('name' => $name, 'message' => $message, 'sesion' => $_SESSION['sesionName'], 'dateTime' => $dateTime);
				return $array;
			}
	    }

	    public function load_messages(){
	    	$sql = $this->db->query("SELECT * FROM tbl_mensajes ORDER BY mensaje_registro");
	    	$html = '';
	    	foreach ($sql as $key ){
	    		$name = $key['mensaje_nombre'];
	    		$message = $key['mensaje_mensaje'];
	    		$dateTime = date('d M Y H:i:s', strtotime($key['mensaje_registro']));
	    		$html .= '<li class="yourMessage"><label>'.$name.': </label>'.$message.' <br><span>'.$dateTime.'<span></li>';
	    	}
	    	return trim($html);
	    }

	}

	if(isset($_POST['name']) AND isset($_POST['message'])){
		$name = $_POST['name'];
		$message = $_POST['message'];
		$class = new Send;
		$process = $class->process($name, $message);
		exit(json_encode($process));
	}
?>