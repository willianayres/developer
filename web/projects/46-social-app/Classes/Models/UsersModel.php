<?php
	namespace Classes\Models;
	class UsersModel
	{
		public static function emailExists($email){
			$check = \Classes\MySQL::connect()->prepare('SELECT `email` FROM `users` WHERE `email` = ?');
			$check->execute([$email]);
			return ($check->rowCount() >= 1);
		}
		public static function getUserById($id){
			$pdo = \Classes\MySQL::connect();
			$check = $pdo->prepare('SELECT * FROM `users` WHERE `id` = ?');
			$check->execute([$id]);
			return $check->fetch();
		}
	}
?>