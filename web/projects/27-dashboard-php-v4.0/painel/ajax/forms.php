<?php

	include('../../config.php');
	if(!Painel::logged()){
		die("Você não está logado!");
	}

	$data['success'] = true;
	$data['msg'] = '';

	if(isset($_POST['action_type']) && ($_POST['action_type'] == 'register')){

		sleep(2);

		$name = $_POST['name'];
		$email = $_POST['email'];
		$client_type = $_POST['client_type'];
		$number = '';
		$img = '';
		if($client_type == 'physical'){
			$number = $_POST['cpf'];
		}else{
			$number = $_POST['cnpj'];
		}
		
		if($name == '' || $email == '' || $client_type == '' || $number == ''){
			$data['success'] = false;
			$data['msg'] .= ' [Campos Vazios não são permitidos!]';
		}

		if(isset($_FILES['img']) && $data['success']){
			if(File::validImg($_FILES['img'])){
				$img = $_FILES['img'];
			}else{
				$data['success'] = false;
				$data['msg'] .= ' [Imagem Inválida!]';
			}
		}else{
			$img = 'default.png';
		}

		if($data['success']){
			// Everything is okay, the client will be registered.
			if(is_array($img))
				$img = File::uploadFile($img, 'clients/');
			$sql = Painel::insertData(array('table' => 'tb_admin.clients', 'name' => $name, 'email' => $email, 'client_type' => $client_type, 'number' => $number, 'img' => $img), false);
			if(!$sql){
				$data['success'] = false;
				$data['msg'] .= ' [Ocorreu um erro ao tentar inserir no banco de dados!]';
			}
			$data['msg'] = ' O cliente foi cadastrado com sucesso!';
		}
	}else if(isset($_POST['action_type']) && $_POST['action_type'] == 'update'){

		sleep(2);

		$id = $_POST['id'];
		$name = $_POST['name'];
		$email = $_POST['email'];
		$client_type = $_POST['client_type'];
		$number = '';
		$img = $_POST['cur_img'];
		if($client_type == 'physical'){
			$number = $_POST['cpf'];
		}else{
			$number = $_POST['cnpj'];
		}
		
		if($name == '' || $email == '' || $client_type == '' || $number == ''){
			$data['success'] = false;
			$data['msg'] .= ' [Campos Vazios não são permitidos!]';
		}

		if(isset($_FILES['img']) && $data['success']){
			if(File::validImg($_FILES['img'])){
				if($img != 'default.png');
					File::deleteFile($img,'clients/');
				$img = $_FILES['img'];
			}else{
				$data['success'] = false;
				$data['msg'] .= ' [Imagem Inválida!]';
			}
		}

		if($data['success']){
			// Everything is okay, the client will be registered.
			if(is_array($img))
				$img = File::uploadFile($img, '/clients/');
			$sql = Painel::updateData(array('table' => 'tb_admin.clients','id' => $id, 'name' => $name, 'email' => $email, 'client_type' => $client_type, 'number' => $number, 'img' => $img));
			if(!$sql){
				$data['success'] = false;
				$data['msg'] .= ' [Ocorreu um erro ao tentar atualizar o cliente no banco de dados!]';
			}
			$data['msg'] = ' O cliente foi atualizado com sucesso!';
		}		

	}else if(isset($_POST['action_type']) && ($_POST['action_type'] == 'delete')){
		
		$id = $_POST['id'];

		//echo 'ok agora é só deletar o cliente de id '.$id.'<br>';

		$img = Painel::getData('tb_admin.clients','img','WHERE id = ?',array($_POST['id']))['img'];
		if($img != 'default.png')
			File::deleteFile($img,'clients/');
		Painel::deleteData('tb_admin.clients',' WHERE id = ?',array($id));
		Painel::deleteData('tb_admin.payments','WHERE client_id = ?',array($id));
	}
	
	header('Content-type: application/json');
	die(json_encode($data));
?>