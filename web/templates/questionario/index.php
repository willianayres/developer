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
			$awnsers = ['20','Willian','Jogos'];
			$points = 0;
			$i=0;
			foreach($_POST as $key => $value){
				if($key != 'send' ){
					if($awnsers[$i] == $value){
						$points++;
					}
					$i++;
				}
			}
			echo '<h2>O seu resultado final foi: <strong>'.$points.' / '.$i.'</strong></h2>';
		}
	?>
	<form method="post">
		<p>Quantos anos você tem?</p>
		<span>20</span> <input type="radio" name="question1" value="20" />
		<br />
		<span>30</span> <input type="radio" name="question1" value="30" />
		<br />
		<span>40</span> <input type="radio" name="question1" value="40" />
		<hr />
		<p>Qual seu nome?</p>
		<span>João</span> <input type="radio" name="question2" value="João" />
		<br />
		<span>Willian</span> <input type="radio" name="question2" value="Willian" />
		<br />
		<span>Theodoro</span> <input type="radio" name="question2" value="Theodoro" />
		<hr />
		<p>O que você gosta de fazer?</p>
		<span>Esportes</span> <input type="radio" name="question3" value="Esportes" />
		<br />
		<span>Leitura</span> <input type="radio" name="question3" value="Leitura" />
		<br />
		<span>Jogos</span> <input type="radio" name="question3" value="Jogos" />
		<hr />
		<input type="submit" name="send" value="Enviar" />
	</form>
</body>
</html>
