<?php include('config.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Questionário </title>
</head>
<body>
	<?php
		if(isset($_POST['send'])){
			if(!isset($_COOKIE['vote'])){
				
				if(!isset($_POST['awnser_id'])){
					header('Location: index.php');
					die();
				}
				setcookie('vote','true',time()+(60*60*24),'/');
				$awnser_id = $_POST['awnser_id'];
				$awnsers_amount = \MySQL::connect()->prepare('SELECT `votes` FROM `poll` WHERE `id` = ?');
				$awnsers_amount->execute([$awnser_id]);
				$awnser_amount = $awnsers_amount->fetch()['votes']+1;
				\MySQL::connect()->exec("UPDATE `poll` SET votes = $awnser_amount WHERE `id` = $awnser_id");
				echo '<h2>Sua votação foi completada com sucesso!</h2>';
			}else{
				echo '<h2>Você já votou!</h2>';
			}
		}
	?>
	<h2>Enquetes ativas:</h2>
	<hr />
	<?php 
		$questions = \MySQL::connect()->prepare('SELECT * FROM `poll_question`');
		$questions->execute();
		$questions = $questions->fetchAll();
		foreach($questions as $key => $value){
			echo '<form method="post">';
			echo '<strong>'.$value['question'].'</strong>';
			echo '<br />';
			$awnsers = \MySQL::connect()->prepare('SELECT * FROM `poll` WHERE `question_id` = ?');
			$awnsers->execute([$value['id']]);
			$awnsers = $awnsers->fetchAll();
			foreach($awnsers as $key2 => $value2){
				echo $value2['awnsers'].'<input type="radio" name="awnser_id" value="'.$value2['id'].'" />';
				echo '<br />';
			}
			echo '<input type="submit" name="send" value="Responder" />';
			echo '</form><hr />';
		}
	?>
</body>
</html>