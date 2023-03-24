<?php

	class User
	{
		
		public function userRegister($user, $password, $img, $name, $office){
			$sql = MySQL::connect()->prepare("INSERT INTO `tb_admin.users` VALUES (null,?,?,?,?,?)");
			$sql->execute(array($user,$password,$img,$name,$office));
		}

		public function userUpdate($name, $password, $img){
			$sql = MySQL::connect()->prepare("UPDATE `tb_admin.users` SET name = ?, password = ?, img = ? WHERE user = ?");
			return $sql->execute(array($name,$password,$img,$_SESSION['user'])) ? true : false;
		}

		public static function userExists($user){
			$sql = MySQL::connect()->prepare("SELECT `id` FROM `tb_admin.users` WHERE user = ?");
			$sql->execute(array($user));
			return ($sql->rowCount() == 1);
		}

	}

?>