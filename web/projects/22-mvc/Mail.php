<?php

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	use PHPMailer\PHPMailer\SMTP;

	class Mail{
		
		private $mailer;

		public function __construct($host,$username,$password,$name){
			
			$this->mailer = new PHPMailer(true);

			//Server settings
			$this->mailer->SMTPDebug  = SMTP::DEBUG_OFF;                        //Disable verbose debug output
			//$this->mailer->SMTPDebug  = SMTP::DEBUG_SERVER;                   //Enable verbose debug output
			$this->mailer->isSMTP();                                            //Send using SMTP
			$this->mailer->Host       = $host; 					                //Set the SMTP server to send through
			$this->mailer->SMTPAuth   = true;                                   //Enable SMTP authentication
			$this->mailer->Username   = $username; 				                //SMTP username
			$this->mailer->Password   = $password;                              //SMTP password
			$this->mailer->Mailer     = 'smtp'; 
			//$this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;       //Enable TLS encryption; 
			$this->mailer->SMTPSecure = 'tsl';						            //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
			$this->mailer->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMail

			$this->mailer->SingleTo = true;										//To send just once

			$this->mailer->SMTPOptions = array(									//To send as localhost
		        'ssl' => array(
		            'verify_peer' => false,
		            'verify_peer_name' => false,
		            'allow_self_signed' => true
		        )
		    );

			//Recipients
		    $this->mailer->setFrom($username,$name);
		    
		    //Attachments
		    //$this->mailer->addAttachment('/var/tmp/file.tar.gz');             //Add attachments
		    //$this->mailer->addAttachment('/tmp/image.jpg', 'new.jpg');        //Optional name

		    //Content
		    $this->mailer->isHTML(true);                                        //Set email format to HTML
		    $this->mailer->CharSet = 'UTF-8';								    //Set the charset format

		    //$this->mailer->send();
		    //Mailer Error: {$this->mailer->ErrorInfo}";
		}

		public function addAddres($email,$name){
				$this->mailer->addAddress($email, $name);     //Add a recipient
			    //$this->mailer->addReplyTo('info@example.com', 'Information');
			    //$this->mailer->addCC('cc@example.com');
			    //$this->mailer->addBCC('bcc@example.com');
		}

		public function formatMail($info){
			$this->mailer->Subject = $info['subject'];
			$this->mailer->Body    = $info['body'];
			$this->mailer->AltBody = strip_tags($info['subject']);
		}

		public function sendMail(){
			return $this->mailer->send();
		}

	}
?>