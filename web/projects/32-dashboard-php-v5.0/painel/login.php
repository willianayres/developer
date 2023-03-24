<?php
	$url = isset($_GET['url']) ? $_GET['url'] : 'home';
	if(isset($_COOKIE['remember'])){
		$user = $_COOKIE['user'];
		$password = $_COOKIE['password'];
		$sql = Painel::getData('tb_admin.users','*',' WHERE user = ? AND password = ?',array($user,$pass),false);
		if($sql->rowCount() == 1){
			$info = $sql->fetch();
			Painel::setSession($user,$password,$info);
			header('Location: '.INCLUDE_PATH_PAINEL.$url);
			die();
		}
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="icon" href="<?php pathPainel();?>favicon.ico" type="image/x-icon" />
		<?php Painel::loadCSS(array('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap'),'',true,true);?>
		<?php Painel::loadCSS(array('fontawesome','default','login','box'),'',true);?>
		<title>Painel de Controle</title>
	</head>
	<body>
		<section class="login">
			<?php
				if(isset($_POST['acao'])){
					$user = $_POST['user'];
					$pass = $_POST['password'];
					$sql = Painel::getData('tb_admin.users','*',' WHERE user = ? AND password = ?',array($user,$pass),false);
					if($sql->rowCount() == 1){
						$info = $sql->fetch();
						Painel::setSession($user,$pass,$info);
						if(isset($_POST['remember'])){
							setcookie('remember',true,time() + 86400,'/');
							setcookie('user',$user,time() + 86400,'/');
							setcookie('password',$pass,time() + 86400,'/');
						}
						header('Location: '.INCLUDE_PATH_PAINEL.$url);
						die();
					}else
						echo '<div class="login-error"><i class="fa fa-times"></i> Usuário ou senha inválido!</div>';
				}
			?>
			<h2>Efetue o Login:</h2>
			<form method="post">
				<input type="text" name="user" placeholder="Login..." required />
				<input type="password" name="password" placeholder="Senha..." required />
				<div class="form-box left">
					<input type="submit" name="acao" value="Logar!" />
				</div><!--form-box-->
				<div class="form-box right">
					<label>Lembrar-me</label>
					<input type="checkbox" name="remember" />
				</div><!--form-box-->
				<div class="clear"></div><!--clear-->
			</form>
		</section><!--login-->
	</body>
</html>