<?php
	namespace Classes\Models;
	class HomeModel
	{
		public static function postFeed($post){
			$pdo = \Classes\MySQL::connect();
			$post = strip_tags($post);
			if(preg_match('/\[imagem/',$post)){
				$post = preg_replace('/(.*?)\[imagem=(.*?)\]/','<p>$1</p><img src="$2" />',$post);
			}else{
				$post = '<p>'.$post.'</p>';
			}
			$postFeed = $pdo->prepare('INSERT INTO `posts` VALUES(null,?,?,?)');
			$postFeed->execute([$_SESSION['id'],$post,date('Y-m-d H:i:s',time())]);
			$update =  $pdo->prepare('UPDATE `users` SET `last_post` = ? WHERE `id` = ?');
			$update->execute([date('Y-m-d H:i:s',time()),$_SESSION['id']]);
		}
		public static function retrieveFriendsPosts(){
			$pdo = \Classes\MySQL::connect();
			$friends = $pdo->prepare('SELECT * FROM `friendships` WHERE (`sent` = ? AND `status` = ?) OR (`received` = ? AND `status` = ?)');
			$friends->execute([$_SESSION['id'],1,$_SESSION['id'],1]);
			
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
				$friends_list[$key]['id'] = \Classes\Models\UsersModel::getUserById($value)['id'];
				$friends_list[$key]['name'] = \Classes\Models\UsersModel::getUserById($value)['name'];
				$friends_list[$key]['email'] = \Classes\Models\UsersModel::getUserById($value)['email'];
				$friends_list[$key]['img'] = \Classes\Models\UsersModel::getUserById($value)['img'];
				$friends_list[$key]['last_post'] = \Classes\Models\UsersModel::getUserById($value)['last_post'];
			}
			usort($friends_list,function($a,$b){
				if(strtotime($a['last_post']) > strtotime($b['last_post'])){
					return -1;
				}else{
					return +1;
				}
			});
			$posts = [];
			foreach($friends_list as $key => $value){
				$last_post = $pdo->prepare('SELECT * FROM `posts` WHERE `user_id` = ? ORDER BY `date` DESC');
				$last_post->execute([$value['id']]);
				if($last_post->rowCount() >= 1){
					$last_post = $last_post->fetch();
					$posts[$key]['user'] = $value['name'];
					$posts[$key]['img'] = $value['img'];
					$posts[$key]['date'] = $last_post['date'];
					$posts[$key]['msg'] = $last_post['msg'];	
				}	
			}

			$me = $pdo->prepare('SELECT * FROM `users` WHERE `id` = ?');
			$me->execute([$_SESSION['id']]);
			$me = $me->fetch();
			if(isset($posts[0])){
				if(strtotime($me['last_post']) > strtotime($posts[0]['date'])){
					$last_post = $pdo->prepare('SELECT * FROM `posts` WHERE `user_id` = ? ORDER BY `date` DESC');
					$last_post->execute([$_SESSION['id']]);
					$last_post = $last_post->fetchAll()[0];
					array_unshift($posts,['date'=>$last_post['date'],'msg'=>$last_post['msg'],'me'=>true]);
				}
			}
			return $posts;
		}
	}
?>