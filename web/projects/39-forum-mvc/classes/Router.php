<?php
	class Router
	{
			
		public static $done;

		public static function isDone(){
			return self::$done;
		}

		public static function get($path,$arg){

			$url = @$_GET['url'];
			if($path == ''){
				$path = '/';
			}
			if(isset($url[0]) != '/' || $url[0] != '/'){
				$url = '/'.$url;
			}
			if($url[strlen($url)-1] != '/'){
				$url.="/";
			}
			if($path[0] != '/'){
				$path = '/'.$path;
			}
			if($path[strlen($path)-1] != '/'){
				$path.="/";
			}
			if($url == $path){
				self::$done = true;
				$arg();
				return true;
			}
			$path = explode('/',$path);
			$url = explode('/',$url);
			$ok = true;
			$par = [];
			if(count($path) == count($url)){
				foreach($path as $key => $value){
					if($value == '?'){
						if($url[$key] === '')
							return;
						$par[$key] = $url[$key];
					}else if($url[$key] != $value){
						$ok = false;
						break;
					}
				}
				if($ok){
					self::$done = true;
					$arg($par);
					return true;
				}
			}
		}


		public static function post($path,$arg){
			if(!empty($_POST)){
				$url = @$_GET['url'];
				if($path == ''){
					$path = '/';
				}
				if($url[0] != '/'){
					$url = '/'.$url;
				}
				if($url[strlen($url)-1] != '/'){
					$url.="/";
				}
				if($path[0] != '/'){
					$path = '/'.$path;
				}
				if($path[strlen($path)-1] != '/'){
					$path.="/";
				}
				if($url == $path){
					self::$done = true;
					$arg();
					return true;
				}
				$path = explode('/',$path);
				$url = explode('/',$url);
				$ok = true;
				$par = [];
				if(count($path) == count($url)){
					foreach($path as $key => $value){
						if($value == '?'){
							if($url[$key] === '')
								return;
							$par[$key] = $url[$key];
						}else if($url[$key] != $value){
							$ok = false;
							break;
						}
					}
					if($ok){
						self::$done = true;
						$arg($par);
						return true;
					}
				}
			}
		}
	}
?>