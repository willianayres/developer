<?php
	$url = isset($_GET['url']) ? $_GET['url'] : 'home';
?>
<section class="header-login">
	<div class="center">
		<div class="wraper">
			<h2><i class="fas fa-sign-in-alt"></i></h2>
			<h2>Efetuar <strong>login</strong> na sua conta.</h2>
		</div><!--wraper-->
	</div><!--center-->
</section><!--header-login-->
<section class="login">
	<?php
		if(isset($_POST['login'])){
			$email = $_POST['email'];
			$password = $_POST['password'];
			$login = Painel::getData('tb_site.users','*',' WHERE email = ? AND password = ?',array($email,$password),0);
			if($login->rowCount() == 1){
				$login = $login->fetch();
				Painel::setSession($email,$password,$login,0);
				header('Location: '.INCLUDE_PATH.$url);
				die();
			}else
				echo '<div class="login-error"><i class="fa fa-times"></i> Usuário ou senha inválido!</div>';
		}
		if(isset($_SESSION['name_site']))
			echo $_SESSION['name_site'];
	?>
	<div class="wraper">
		<form method="post">
			<div class="group">
				<label>E-mail</label>
				<input type="email" name="email" placeholder="E-mail..." required />
				<p><i class="fas fa-envelope"></i></p>
			</div><!--group-->
			<div class="group">
				<label>Senha</label>
				<input type="password" name="password" placeholder="Senha..." required />
				<p><i class="fas fa-key"></i></p>
			</div><!--group-->
			<div class="form-box left">
				<input type="submit" name="login" value="Logar" />
			</div><!--form-box-->
			<div class="form-box right">
				<a href="">Esqueci minha senha</a>
			</div><!--form-box-->
			<div class="clear"></div><!--clear-->
		</form>
	</div><!--wraper-->
</section><!--login-->