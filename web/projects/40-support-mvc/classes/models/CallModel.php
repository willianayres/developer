<?php
	namespace Models;

	class CallModel{
		public static function issetToken($token){
			$check = \MySQL::connect()->prepare('SELECT * FROM `calls` WHERE `token` = ?');
			$check->execute([$token]);
			return ($check->rowCount() == 1);
		}
		public static function getCall($token){
			$sql = \MySQL::connect()->prepare('SELECT * FROM `calls` WHERE `token` = ?');
			$sql->execute([$token]);
			return $sql->fetch();
		}
		public static function getInteractions($call_id, $query = '',$fetch = true){
			$get_interactions = \MySQL::connect()->prepare('SELECT * FROM `interaction-call` WHERE `call_id` = ? '.$query);
			$get_interactions->execute([$call_id]);
			return $fetch ? $get_interactions->fetchAll() : $get_interactions;
		}
		public static function insertPost($post){
			$call_id = $post['token'];
			$msg = $post['msg'];
			$sql = \MySQL::connect()->prepare('INSERT INTO `interaction-call` VALUES (null,?,?,?,?)');
			$sql->execute([$call_id,$msg,-1,0]);
		}
	}
?>