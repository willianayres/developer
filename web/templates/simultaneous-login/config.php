<?php
	// Star a new session to login.
	session_start();

	// Set the timezone.
	date_default_timezone_set('America/Sao_Paulo');
	
	// Autoload all the classes.
	$autoload = function($class){	
		include('classes/'.$class.'.php');
	};
	spl_autoload_register($autoload);

	// Conection to the Database.
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','test');

	// Root Paths.
	define('INCLUDE_PATH','http://localhost/SimultaneosLogin/');

	define('BASE_DIR_PAINEL',__DIR__.'\painel');
?>