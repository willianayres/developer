<?php 
	include('config.php');
	Site::updateUsersOn();
	Site::countVisits();

	$homeController = new controllers\homeController();
	$enterprisesController = new controllers\enterprisesController();

	Router::get('/',function() use ($homeController){
		$homeController->index();
	});

	Router::get('/?',function($par) use ($enterprisesController){
		$enterprisesController->index($par);
	});
?>