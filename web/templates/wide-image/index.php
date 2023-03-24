<?php
	include('config.php');
	//include('lib/WideImage.php');
	//include("classes/geoiploc.php");
	//$ip = '189.4.106.193';
	//getCountryFromIP($ip);
	$_SESSION['questions'][] = "Quanto custa o curso?";
	$_SESSION['questions'][] = "Posso parcelar?";

	$_SESSION['awnsers'][] = "R$ 200,00";
	$_SESSION['awnsers'][] = "Sim!";

	if(isset($_POST['send_question'])){
		$question = $_POST['question'];
		$question = str_replace('?','',$question);
		$question = str_replace(' ','',$question);
		foreach($_SESSION['questions'] as $key => $value){
			$value = str_replace(' ','',$value);
			$check = preg_match('/'.$question.'/i',$value);
			if($check){
				$awnser = $_SESSION['awnsers'][$key];
				break;
			}
		}
	}else if(isset($_POST['send_awnser'])){
		$_SESSION['questions'][] = $_POST['question'];
		$_SESSION['awnsers'][] = $_POST['awnser'];
		echo '<script>alert("Obrigado, você me ajudou a aprender um pouco mais :)");</script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aprendizado de máquina</title>
</head>
<body>
	<form method="post">
		<h2>Realize sua pergunta:</h2>
		<input type="text" name="question" />
		<input type="submit" name="send_question" value="Enviar" />
	</form>
	<?php
		if(isset($awnser)){
			echo '<h2>Sua resposta, com base na pergunta, provavelmente é: </h2>'.$awnser;
		}else if(isset($_POST['send_question'])){
			echo '<h2>Ops... O nosso robo não entendeu sua pergunta!</h2>';
			$new_awnser = true;
		}
	?>
	<?php if(isset($new_awnser) && isset($_POST['send_question'])){ ?>
		<form method="post">
			<h2>Tem alguma ideia da resposta para ajudar o robo a aprender mais?</h2>
			<input type="text" name="awnser" />
			<input type="hidden" name="question" value="<?php echo $_POST['question'];?>" />
			<input type="submit" name="send_awnser" value="Enviar" />
		</form>
	<?php } ?>
</body>
</html>