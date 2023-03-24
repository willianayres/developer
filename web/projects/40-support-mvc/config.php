<?php
	// Set the timezone.
	date_default_timezone_set('America/Sao_Paulo');
	
	// Autoload all the classes.
	$autoload = function($class){	
		include('classes/'.$class.'.php');
	};
	spl_autoload_register($autoload);
	require 'classes/vendor/autoload.php';
	// Conection to the Database.
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','support');

	// Root Paths.
	define('INCLUDE_PATH','http://localhost/phpjedy/');
?>