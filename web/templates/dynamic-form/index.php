<?php
	include('config.php');
	$questions = ['Qual seu nome?','Qual sua idade?','Qual sua cor favorita?','Quem é seu(a) melhor amigo(a) ?'];
	if(!isset($_SESSION['awnsers']))
		$_SESSION['awnsers'] = [];
	$index = isset($_POST['count']) ? (int)$_POST['count'] + 1: 0;

	if(isset($_POST['send'])){
		$_SESSION['awnsers'][$_POST['count']] = $_POST['awnser'];
		if(count($questions) == $_POST['count']+1){
			header('Location: result.php');
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Formulário Inteligente </title>
</head>
<body>
	<form method="post">
		<h2><?php echo $questions[$index];?></h2>
		<input type="text" name="awnser" value="" />
		<input type="hidden" name="count" value="<?php echo $index?>" />
		<input type="submit" name="send" value="Enviar e Próxima pergunta!" />
	</form>
</body>
</html>