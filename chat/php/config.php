<?php 
	session_start();
	
	define('URL_BASE', 'http://192.168.1.38/chat/');
	define('SOCKET_FRONTEND', '192.168.1.38:8080');
	define('SOCKET_BACKEND_IP', '192.168.1.38');
	define('SOCKET_BACKEND_PORT', '8080');

	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', 'root');
	define('DB_NAME', 'chat');
	define('DB_CHARSET', 'utf8');
?>