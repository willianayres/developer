<?php

	class Site
	{

		public static function listUsersOn(){
			self::clearUsersOn();
			$sql = MySQL::connect()->prepare("SELECT * FROM `tb_admin.on`");
			$sql->execute();
			return $sql->fetchAll();
		}

		public static function clearUsersOn(){
			$date = date('Y-m-d H:i:s');
			$sql = MySql::connect()->exec("DELETE FROM `tb_admin.on` WHERE last_action < '$date' - INTERVAL 1 MINUTE");
		}
		
		public static function updateUsersOn(){
			if(isset($_SESSION['online'])){
				$token = $_SESSION['online'];
				$actualTime = date('Y-m-d H:i:s');
				$check = MySQL::connect()->prepare("SELECT `id` FROM `tb_admin.on` WHERE token = ?");
				$check->execute(array($_SESSION['online']));

				if($check->rowCount() == 1){
					$sql = MySQL::connect()->prepare("UPDATE `tb_admin.on` SET last_action = ? WHERE token = ?");
					$sql->execute(array($actualTime, $token));	
				}else{
					if(!empty($_SERVER['HTTP_CLIENT_IP']))
						$ip = $_SERVER['HTTP_CLIENT_IP'];
					elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
						$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
					else
						$ip = $_SERVER['REMOTE_ADDR'];

					$token = $_SESSION['online'];
					$actualTime = date('Y-m-d H:i:s');
					$sql = MySQL::connect()->prepare("INSERT INTO `tb_admin.on` VALUES (null,?,?,?)");
					$sql->execute(array($ip, $actualTime, $token));
				}
			}else{
				$_SESSION['online'] = uniqid();
				if(!empty($_SERVER['HTTP_CLIENT_IP']))
					$ip = $_SERVER['HTTP_CLIENT_IP'];
				elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
					$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
				else
					$ip = $_SERVER['REMOTE_ADDR'];
				$token = $_SESSION['online'];
				$actualTime = date('Y-m-d H:i:s');
				$sql = MySQL::connect()->prepare("INSERT INTO `tb_admin.on` VALUES (null,?,?,?)");
				$sql->execute(array($ip, $actualTime, $token));
			}
		}

		public static function countVisits(){
			if(!isset($_COOKIE['visit'])){
				setcookie('visit', 'true', time() + 86400);
				$sql = MySQL::connect()->prepare("INSERT INTO `tb_admin.visits` VALUES (null,?,?)");
				$sql->execute(array($_SERVER['REMOTE_ADDR'], date('Y:m:d')));
			}
		}

	}

?>