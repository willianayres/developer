<?php

	if(isset($_POST['send'])){
		
		// Cep validation 99.999-999
		/*
		$cep = $_POST['cep'];
		$check = preg_match('/[0-9]{5}-[0-9]{3}$/',$cep);
		if($check)
			echo 'Sucesso!';
		else
			echo 'CEP Inválido!';
		*/

		// Tel validation 99999-9999 or (41) 99999-9999
		/*
		$tel = $_POST['tel'];
		$check = preg_match('/^(\([0-9]{2}\)|)[0-9]{5}-[0-9]{4}$/',$tel);
		if($check)
			echo 'Sucesso!';
		else
			echo 'TELEFONE Inválido!';
		*/

		// Name validation Zzzzzzzzzzzzzzzzzzzz Zzzzzzzzzzzzzzzzzzzz
		$name = $_POST['name'];
		$check = preg_match('/^[A-Z]{1}[a-z]{1,} [A-Z]{1}[a-z]{1,}$/',$name);
		if($check)
			echo 'Sucesso!';
		else
			echo 'NOME Inválido!';
	}

?>

<form method="post">
	<!--<input type="text" name="cep" placeholder="CEP..." required />-->
	<!--<input type="telephone" name="tel" placeholder="Telefone..." required />-->
	<input type="text" name="name" placeholder="Nome..." required />
	<input type="submit" name="send" value="Enviar" />
</form>