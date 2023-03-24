<?php
	include('../../config.php');
	if(!Painel::logged()){
		die("Você não está logado!");
	}
	$data = [];
	$data['success'] = true;
	$data['msg'] = '';
	if(isset($_POST['action']) && $_POST['action'] == 'insert'){
		$data['task'] = $_POST['task'];
		$data['date'] = $_POST['date'];
		\Painel::insertData(array('table'=>'tb_admin.tasks','task'=>$data['task'],'date'=>$data['date']),0);
		die(json_encode($data));
	}else if(isset($_POST['action']) && $_POST['action'] == 'get'){
		$date = $_POST['date'];
		$tasks = \Painel::getData('tb_admin.tasks','*',' WHERE date = ? ORDER BY id DESC',array($date),1,1);
		$content = "";
		foreach($tasks as $key => $value){
			$content .= '<div class="task">';
			$content .= '    <h3><i class="fas fa-pen"></i> '.$value['task'].'</h3>';
			$content .= '</div><!--task-->';
		}
		die($content);
	}

?> 