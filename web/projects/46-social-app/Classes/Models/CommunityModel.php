<?php
	namespace Classes\Models;
	class CommunityModel
	{
		public static function listCommunity(){
			$check = \Classes\MySQL::connect()->prepare('SELECT * FROM `users`');
			$check->execute();
			return $check->fetchAll();
		}
		public static function requestFriendship($id){
			$pdo = \Classes\MySQL::connect();
			$check = $pdo->prepare('SELECT * FROM `friendships` WHERE (`sent` = ? AND `received` = ?) OR (`sent` = ? AND `received` = ?)');
			$check->execute([$_SESSION['id'],$id,$id,$_SESSION['id']]);
			if($check->rowCount() >= 1){
				return false;
			}else{
				$insert = $pdo->prepare('INSERT INTO `friendships` VALUES(null,?,?,?)');
				if($insert->execute([$_SESSION['id'],$id,0])){
					return true;
				}else{
					return false;
				}
			}
		}
		public static function issetRequestFriendship($id){
			$pdo = \Classes\MySQL::connect();
			$check = $pdo->prepare('SELECT * FROM `friendships` WHERE (`sent` = ? AND `received` = ?) OR (`sent` = ? AND `received` = ?)');
			$check->execute([$_SESSION['id'],$id,$id,$_SESSION['id']]);
			return (!$check->rowCount() >= 1);
		}
		public static function listPendentRequests(){
			$pdo = \Classes\MySQL::connect();
			$check = $pdo->prepare('SELECT * FROM `friendships` WHERE `received` = ? AND `status` = ?');
			$check->execute([$_SESSION['id'],0]);
			return $check->fetchAll();
		}
		public static function updateRequestFriendship($sent,$status){
			$pdo = \Classes\MySQL::connect();
			if($status == 0){
				$del = $pdo->prepare('DELETE FROM `friendships` WHERE `sent` = ? AND `received` = ? AND `status` = ?');
				$del->execute([$sent,$_SESSION['id'],0]);
			}else if($status == 1){
				$accept = $pdo->prepare('UPDATE `friendships` SET `status` = 1 WHERE `sent` = ? AND `received` = ?');
				$accept->execute([$sent,$_SESSION['id']]);
				return ($accept->rowCount() == 1);
			}
		}
		public static function checkFriendship($id){
			$pdo = \Classes\MySQL::connect();
			$check_friendship = $pdo->prepare('SELECT * FROM `friendships` WHERE (`sent` = ? AND `received` = ? AND `status` = ?) OR (`sent` = ? AND `received` = ? AND `status` = ?)');
			$check_friendship->execute([$id,$_SESSION['id'],1,$_SESSION['id'],$id,1]);
			return $check_friendship;

		}
		public static function listFriendships(){
			$pdo = \Classes\MySQL::connect();
			$friends = $pdo->prepare('SELECT * FROM `friendships` WHERE (`sent` = ? AND `status` = ?) OR (`received` = ? AND `status` = ?)');
			$friends->execute([$_SESSION['id'],1,$_SESSION['id'],1]);
			$friends = $friends->fetchAll();
			$friends_ok = [];
			foreach($friends as $key => $value){
				if($value['sent'] == $_SESSION['id']){
					$friends_ok[] = $value['received'];
				}else{
					$friends_ok[] = $value['sent'];
				}
			}
			$friends_list = [];
			foreach($friends_ok as $key => $value){
				$friends_list[$key]['name'] = \Classes\Models\UsersModel::getUserById($value)['name'];
				$friends_list[$key]['email'] = \Classes\Models\UsersModel::getUserById($value)['email'];
				$friends_list[$key]['img'] = \Classes\Models\UsersModel::getUserById($value)['img'];
			}
			return $friends_list;
		}
	}
?>