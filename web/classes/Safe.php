<?php
	// Conexão segura com banco de dados.
	try{
		$pdo = new PDO('mysql:host=localhost;dbname=db','root','');
	}catch(Exception $e){
		//echo $e->getMessage();
		echo 'Não foi possível conectar! Tente novamente mais tarde!';
	}
	// SQL Injection.
	//prepare("SELECT * FROM `tb` WHERE login=? AND password=?"); execute array($var1,$var2);

	// HTACCESS -> #1 URL amigável; #2 Proteger pastas.
	/*
		#1
		RewriteEngine On
		RewriteCond %{SCRIPT_FILENAME} !-f
		RewriteCond %{SCRIPT_FILENAME} !-d
		RewriteRule ^(.*)$ index.php?url=$1 [QSA,L]
		#2
		Options -Indexes
	*/

	// Criptografando senha.
	$password = md5('admin');
	$password = sha1('admin');

	// Por camadas.
	<html>
		$logado = true;
	</html>
	'projeto/pages/home.php';
	if(isset($logado))
		echo 'Aqui está o conteudo da home';
	else
		echo 'Arquivo protegido!';

	// Login via ajax individualmente.
	session_start();
	$_SESSION['login'] = true;
	if(isset($_SESSION['login'])){
		// Faz a requisição.
	}

	// Evitando Loggin simultâneo.
	session_start();
	$pdo = new PDO("mysql:host=localhost;dbname=db",'root','');

	if(isset($_POST['login']) && !isset($_SESSION['login'])){
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['toke'] = uniqid();
		$sql = $pdo->prepare("DELETE FROM `tb` WHERE login = ?");
		$sql->execute(array($_SESSION['login']));
		$sql = $pdo->prepare("INSERT INTO `tb` VALUES (null,?,?)");
		$sql->execute(array($_SESSION['login'],$_SESSION['token']));
	}

	if(!isset($_SESSION['login'])){
		echo '<h2>Realize seu login:</h2><br /><form method="post"><input type="text" name="login" /><input type="submit" name="action" value="Enviar!" /></form>';
	}else{
		$token = $_SESSION['token'];
		$check = $pdo->prepare("SELECT `id` FROM `tb` WHERE login = ? AND token = ?");
		$check->execute(array($_SESSION['login'],$token));
		if($check->rowCount() == 1){
			echo 'Olá '.$_SESSION['login'].'!';
		}else{
			session_destroy();
		}
	}
?>