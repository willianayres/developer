<?php
	include('config.php');

	$forumController = new \Controllers\forumController();

	\Router::get('',function() use ($forumController){
		$forumController->home();
	});
	\Router::get('/?',function($par) use ($forumController){
		$forumController->topics($par[1]);
	});
	\Router::get('?/?',function($par) use ($forumController){
		$forumController->singlePost($par);
	});

	if(!\Router::isDone()){
		die('Não existe!');
	}
?>