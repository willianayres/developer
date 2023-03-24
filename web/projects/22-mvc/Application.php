<?php

	define('INCLUDE_PATH',		'http://localhost/MVC/');
	define('INCLUDE_PATH_FULL', 'http://localhost/MVC/Views/pages/');

	class Application{

		public function execute(){
			$url = isset($_GET['url']) ? explode('/',$_GET['url'])[0] : 'Home';
			$url = ucfirst($url);
			$url .= 'Controller';
			if(file_exists('Controllers/'.$url.'.php')){
				$class = 'Controllers\\'.$url;
				$controller = new $class;
				$controller->execute();
			}else{
				die("Não existe este Controller!");
			}
		}
	}
?>