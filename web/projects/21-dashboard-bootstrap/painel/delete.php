<?php
	if(isset($_POST['id_member'])){
		$pdo = new PDO('mysql:host=localhost;dbname=bootstrap','root','');
		$sql = $pdo->prepare("DELETE FROM `tb_members` WHERE id=?");
		$sql->execute(array($_POST['id_member']));
	}
?>