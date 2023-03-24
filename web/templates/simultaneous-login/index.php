<?php	
	include('config.php');

	if(isset($_POST['login_action']) && !isset($_SESSION['login'])){
		$login = $_POST['login'];
		$token = uniqid();
		$_SESSION['login'] = $login;
		$_SESSION['token'] = $token;
		$sql = \MySQL::connect()->prepare('DELETE FROM `login` WHERE `login` = ?');
		$sql->execute([$_SESSION['login']]);
		$sql = \MySQL::connect()->prepare('INSERT INTO `login` VALUES(null,?,?)');
		$sql->execute([$_SESSION['login'],$_SESSION['token']]);
	}

	if(!isset($_SESSION['login'])){
		echo '<h2>Realize seu login:</h2>';
		echo '<form method="post">
				<input type="text" name="login" placeholder="Login..." required />
				<input type="submit" name="login_action" value="Entrar" />
			</form>';
	}else{
		$token = $_SESSION['token'];
		$login = $_SESSION['login'];
		$check = \MySQL::connect()->prepare('SELECT `id` FROM `login` WHERE `login` = ? AND `token` = ?');
		$check->execute([$login,$token]);
		if($check->rowCount() == 1){
			echo 'Olá '.$_SESSION['login'].'. Tudo certo!';
		}else{
			echo 'Ops você será deslogado pois encontramos outro usuário logado na sua conta!';
			session_destroy();
		}
		
	}
?>