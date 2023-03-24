<?php
	namespace Models;

	class AdminModel{
		public static function getCalls($query = '', $array = [],$fetch = true){
			$sql = \MySQL::connect()->prepare('SELECT * FROM `calls` '.$query);
			$sql->execute($array);
			return $fetch ? $sql->fetchAll() : $sql;
		}
		public static function getInteractions($query = '', $array = [], $fetch = true){
			$sql = \MySQL::connect()->prepare('SELECT * FROM `interaction-call` '.$query);
			$sql->execute($array);
			return $fetch ? $sql->fetch() : $sql;
		}
		public static function insertPost($post){
			if(isset($post['token']))
				$token = $post['token'];
			if(isset($post['call_id']))
				$token = $post['call_id'];
			$msg = $post['msg'];
			$sql = \MySQL::connect()->prepare('INSERT INTO `interaction-call` VALUES (null,?,?,?,?)');
			$sql->execute([$token,$msg,1,1]);
		}
		public static function updatePost($post){
			$sql = \MySQL::connect()->exec('UPDATE `interaction-call` SET `status` = 1 WHERE `id` = '.$post['id']);
		}
		public static function sendMail($info){
			if(isset($info['token']))
				$token = $info['token'];
			if(isset($info['call_id']))
				$token = $info['call_id'];
			$mail = new \Email('ssl://smtp.gmail.com','will.joris@gmail.com','KLEB%RT~Jm8hE+@%','Willian');
			try{
				$mail->addAddres($info['email'],'Willian');
				$email = array('subject' => 'Nova interação no chamado: '.$token, 'body' => 'Olá, seu chamado tem uma nova interação!<br /><br />Utilize o link abaixo para interagir:<br /><br /><a href="'.INCLUDE_PATH.'call?token='.$token.'">Acessar Chamado</a>');
				$mail->formatMail($email);
				$mail->sendMail();
			}catch(Exception $e){
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}
	}
?>