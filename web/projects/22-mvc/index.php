<?php
	$autoload = function($class){
		if($class == 'Mail'){
			require __DIR__ . '/classes/autoload.php';
		}
		include($class.'.php');
	};

	spl_autoload_register($autoload);

	date_default_timezone_set('America/Sao_Paulo');
	
	$app = new Application();
	$app->execute();
?>