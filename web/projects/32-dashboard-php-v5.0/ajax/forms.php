<?php
	// Include the main config file.
	include('../config.php');
	// Variables.
	$body = '';
	$data = array();
	$subject = 'New messagem from the website!';
	// Append the form content to the body of the message.
	foreach($_POST as $key => $value){
		$body .= ucfirst($key) . " : " . $value;
		$body .= "<hr />";
	}
	// Set the info of the e-mail.
	$info = array('subject' => $subject, 'body' => $body);
	// Set a new Email object with the right parameters.
	$mail = new Email('ssl://smtp.gmail.com','will.joris@gmail.com','KLEB%RT~Jm8hE+@%','Willian');
	$mail->addAddres('will.joris@gmail.com','Willian');
	$mail->formatMail($info);
	// Check if the e-mail was sent to set the data.
	$mail->sendMail() ? $data['success'] = true : $data['erro'] = true;
	// Return the data to the ajax.
	header('Content-type: application/json');
	die(json_encode($data));
?>