<?php

	include('../../config.php');
	if(!Painel::logged()){
		die("Você não está logado!");
	}

	$data['success'] = true;
	$data['msg'] = '';

	if(isset($_POST['action_type']) && $_POST['action_type'] = 'order_items'){
		$ids = $_POST['ids'];
		$i = 1;
		foreach ($ids as $key => $value){
			Painel::updateData(array('table'=>'tb_admin.enterprises','order_id'=>$i,'id'=>$value));
			$i++;
		}
		die('Empreendimentos Ordernados! '.json_encode($data));
	}

	//header('Content-type: application/json');
	die(json_encode($data));
?>