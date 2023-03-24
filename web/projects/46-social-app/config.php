<?php
	// Star a new session to login.
	session_start();

	// Set the timezone.
	date_default_timezone_set('America/Sao_Paulo');

	// Conection to the Database.
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','test');

	// Root Paths.
	define('INCLUDE_PATH','http://localhost/RedeSocial/');
	define('INCLUDE_PATH_STATIC','http://localhost/RedeSocial/Classes/Views/pages/');
	function path(){echo INCLUDE_PATH;}
	function pathStatic(){echo INCLUDE_PATH_STATIC;}

	define('BASE_DIR',__DIR__.'/');
	define('BASE_DIR_STATIC',BASE_DIR.'Classes/Views/pages/');
?>