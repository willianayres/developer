<?php

	// Star a new session to login.
	session_start();

	// Set the timezone.
	date_default_timezone_set('America/Sao_Paulo');
	
	// Autoload all the classes.
	$autoload = function($class){
		if(file_exists('classes/'.$class.'.php')){
			include('classes/'.$class.'.php');
		}else{
			die('Não foi possível encontrar a classe: '.$class);
		}
	};
	spl_autoload_register($autoload);

	// Conection to the Database.
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','test');

	// Root Paths.
	define('INCLUDE_PATH','http://localhost/Full_MVC/');

	function path(){echo INCLUDE_PATH;}

	define('BASE_DIR',__DIR__.'');
?>