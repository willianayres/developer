<?php

	namespace Models;

	class ContatoModel{
		
		public static function sendForm(){
			$mail = new \Mail('ssl://smtp.gmail.com','will.joris@gmail.com','KLEB%RT~Jm8hE+@%','Willian');
			$mail->addAddres('will.joris@gmail.com','Willian');
			$mail->formatMail(array('subject'=>'Mensagem','body'=>'Corpo da mensagem!'));
			$mail->sendMail();
		}

	}
?>