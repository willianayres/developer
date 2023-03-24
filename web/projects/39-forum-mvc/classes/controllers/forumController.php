<?php
	namespace Controllers;

	class forumController
	{

		private $forumModel;

		public function __construct(){
			$this->forumModel = new \Models\forumModel();
		}

		public function home(){
			if(isset($_POST['register_forum'])){
				// Register the forum.
				$name = $_POST['forum_title'];
				$sql = \MySQL::connect()->prepare('INSERT INTO `tb_forums` VALUES (null,?)');
				$sql->execute([$name]);
				echo '<script>alert("Cadastro realizado com sucesso!");</script>';
			}
			$this->forumModel->listForum();
		}

		public function topics($forum_id){

			if(isset($_POST['register_topic'])){
				$name = $_POST['topic_title'];
				$sql = \MySQL::connect()->prepare('INSERT INTO `tb_forum.topics` VALUES (null,?,?)');
				$sql->execute([$forum_id,$name]);
				echo '<script>alert("Cadastro realizado com sucesso!");</script>';
			}

			$sql = \MySQL::connect()->prepare('SELECT id FROM `tb_forums` WHERE id = ?');
			$sql->execute([$forum_id]);
			if($sql->rowCount() == 1){
				$this->forumModel->listTopics($forum_id);
			}else{
				die('O fórum de id "'.$forum_id.'" não existe');
			}
		}

		public function singlePost($par){

			if(isset($_POST['register_post'])){
				$name = $_POST['username'];
				$message = $_POST['message'];
				$topic_id = $_POST['topic_id'];
				$sql = \MySQL::connect()->prepare('INSERT INTO `tb_forum.posts` VALUES (null,?,?,?)');
				$sql->execute([$topic_id,$name,$message]);
				echo '<script>alert("Seu post foi enviado!");</script>';
			}

			$check = \MySQL::connect()->prepare('SELECT id FROM `tb_forum.topics` WHERE id = ?');
			$check->execute([$par[2]]);
			if($check->rowCount() == 1){
				$this->forumModel->listPosts($par);
			}else{
				die('O tópico de id "'.$par[2].'" não existe!');
			}
		}
	}
?>