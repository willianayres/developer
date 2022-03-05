<?php

	class Cache{
		
		function __construct(){

		}

		public function readCache(){
			if(file_exists('cache')){
				$data = json_decode(file_get_contents('cache'));
				if($data->time < time()){
					echo 'Criando novo cache!<hr/>';
					$data = json_encode(['time'=>time()+10,'content'=>'<h2>O nosso site está em manutenção!</h2>']);
					file_put_contents('cache', $data);
					$data = json_decode($data);
				}
			}else{
				echo 'Criando cache pela primeira vez!<hr/>';
				$data = json_encode(['time'=>time()+10,'content'=>'<h2>O nosso site está em manutenção!</h2>']);
				file_put_contents('cache', $data);
				$data = json_decode($data);
			}
		
			return $data;
		}

	}
?>