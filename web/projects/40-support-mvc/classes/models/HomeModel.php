<?php 
	namespace Models;
	class HomeModel{

		public static function insertPost($post){
			$email = $post['email'];
			$msg = $post['msg'];
			$token = md5(uniqid());
			$info = ['email'=>$email,'msg'=>$msg,'token'=>$token];
			$sql = \MySQL::connect()->prepare('INSERT INTO `calls` VALUES (null,?,?,?)');
			$sql->execute(array_values($info));

			return $info;
		}
		public static function sendMail($info){
			$mail = new \Email('ssl://smtp.gmail.com','will.joris@gmail.com','KLEB%RT~Jm8hE+@%','Willian');
			try{
				$mail->addAddres($info['email'],'Willian');
				$email = array('subject' => 'Seu chamado foi aberto.', 'body' => 'Olá, seu chamado foi aberto com sucesso!<br /><br />Utilize o link abaixo para interagir:<br /><br /><a href="'.INCLUDE_PATH.'call?token='.$info['token'].'">Acessar Chamado</a>');
				$mail->formatMail($email);
				$mail->sendMail();
			}catch(Exception $e){
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		}
	}
?>