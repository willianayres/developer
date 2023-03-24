<?php
	include('config.php');

	$HomeController = new \Controllers\HomeController();
	$AdminController = new \Controllers\AdminController();
	$CallController = new \Controllers\CallController();

	Router::get('/',function() use ($HomeController){
		$HomeController->index();
	});

	Router::post('/',function() use ($HomeController){
		$HomeController->index();
	});
	
	Router::get('/call',function() use ($CallController){
		if(isset($_GET['token'])){
			if($CallController->issetToken($_GET['token'])){
				// Render the token.
				$info = $CallController->getCall($_GET['token']);
				$CallController->index($info);
			}else{
				echo 'O token está setado, porém não existe!';
			}
		}else{
			die('Apenas com o token do chamado para você conseguir interagir!');
		}
	});

	Router::post('/call',function() use ($CallController){
		if(isset($_GET['token'])){
			if($CallController->issetToken($_GET['token'])){
				// Render the token.
				$info = $CallController->getCall($_GET['token']);
				$CallController->index($info);
			}else{
				echo 'O token está setado, porém não existe!';
			}
		}else{
			die('Apenas com o token do chamado para você conseguir interagir!');
		}
	});

	Router::get('/admin',function() use ($AdminController){
		$AdminController->index(null);
	});

	Router::post('/admin',function() use ($AdminController){
		$AdminController->index(null);
	});
?>