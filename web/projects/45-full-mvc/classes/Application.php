<?php
	class Application{

		const DEFAULT = 'Home';

		public function run(){
			if(isset($_GET['url'])){
				$url = explode('/',$_GET['url']);
				$class = '\\Controllers\\'.ucfirst($url[0]).'Controller';
			}else{
				$class = '\\Controllers\\'.self::DEFAULT.'Controller';
				$url[0] = self::DEFAULT;
			}

			$view = '\\Views\\'.ucfirst($url[0]).'View';
			$model = '\\Models\\'.ucfirst($url[0]).'Model';

			$controller = new $class(new $view,new $model);
			$controller->index();
		}
	}
?>