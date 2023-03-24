<?php
	namespace Models;

	class forumModel
	{
		public function listForum(){
			$forums = \MySQL::connect()->prepare('SELECT * FROM `tb_forums`');
			$forums->execute();
			$forums = $forums->fetchAll();
			include('views/forum_home.php');
		}

		public function listTopics($forum_id){
			$forum_name = \MySQL::connect()->prepare('SELECT name FROM `tb_forums` WHERE id = ?');
			$forum_name->execute([$forum_id]);
			$forum_name = $forum_name->fetch()['name'];
			$topics = \MySQL::connect()->prepare('SELECT * FROM `tb_forum.topics` WHERE forum_id = ?');
			$topics->execute([$forum_id]);
			$topics = $topics->fetchAll();
			include('views/topicos.php');
		}

		public function listPosts($par){
			$forum_id = $par[1];
			$topic_id = $par[2];
			$forum_name = \MySQL::connect()->prepare('SELECT * FROM `tb_forums` WHERE id = ?');
			$forum_name->execute([$forum_id]);
			$forum_name = $forum_name->fetch()['name'];
			$topic_name = \MySQL::connect()->prepare('SELECT * FROM `tb_forum.topics` WHERE id = ?');
			$topic_name->execute([$topic_id]);
			$topic_name = $topic_name->fetch()['name'];
			$get_posts = \MySQL::connect()->prepare('SELECT * FROM `tb_forum.posts` WHERE topic_id = ?');
			$get_posts->execute([$topic_id]);
			$get_posts = $get_posts->fetchAll();
			include('views/post.php');
		}
	}
?>