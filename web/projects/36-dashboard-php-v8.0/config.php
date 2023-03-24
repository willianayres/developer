<?php

	// Star a new session to login.
	session_start();

	// Set the timezone.
	date_default_timezone_set('America/Sao_Paulo');

	// Autoload the PHPMailer.
	require __DIR__ . '/classes/vendor/autoload.php';
	
	// Autoload all the classes.
	$autoload = function($class){	
		include('classes/'.$class.'.php');
	};
	spl_autoload_register($autoload);

	// Conection to the Database.
	define('HOST','localhost');
	define('USER','root');
	define('PASSWORD','');
	define('DATABASE','panel');

	// Root Paths.
	define('INCLUDE_PATH','http://localhost/DashboardPHP/');
	define('INCLUDE_PATH_PAINEL',INCLUDE_PATH.'painel/');
	define('IMAGES',INCLUDE_PATH_PAINEL.'uploads/');

	function path(){echo INCLUDE_PATH;}
	function pathPainel(){echo INCLUDE_PATH_PAINEL;}
	function images(){echo IMAGES;}

	define('BASE_DIR_PAINEL',__DIR__.'\painel');

	// Consts for the Dashboard.
	define('COMPANY_NAME','W.J.A. Developer');
	define('PER_PAGE', 3);

?>