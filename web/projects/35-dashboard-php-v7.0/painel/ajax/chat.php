<?php 
	include('../../config.php');
	if(!Painel::logged()){
		die("Você não está logado!");
	}

	$data['success'] = true;
	$data['msg'] = '';
	

	if(isset($_POST['action']) && $_POST['action'] == 'insert_message'){

		$user_id = $_SESSION['user_id'];
		$user = $_SESSION['name'];
		$message = $_POST['message'];

		\Painel::insertData(array('table'=>'tb_admin.chat','user_id'=>$user_id,'msg'=>$message),0);
		$last_id_chat = \Painel::getData('tb_admin.chat','*','',[],1,1);
		$_SESSION['last_id_chat'] = $last_id_chat[count($last_id_chat)-1]['id'];
		
		echo '<div class="msg-chat">
				<span>'.$user.':</span>
				<p>'.$message.'</p>
			</div><!--msg-chat-->';

	}else if(isset($_POST['action']) && $_POST['action'] == 'get_messages'){
		if(!isset($_SESSION['last_id_chat'])){
			$last_id_chat = \Painel::getData('tb_admin.chat','*','',[],1,1);
			$_SESSION['last_id_chat'] = $last_id_chat[count($last_id_chat)-1]['id'];
		}
		$last_id = $_SESSION['last_id_chat'];	
		$messages = \Painel::getData('tb_admin.chat','*',' WHERE id > ?',array($last_id),1,1);
		$messages = array_reverse($messages);
		foreach($messages as $key => $value){
			$user_msg = \Painel::getData('tb_admin.users','name',' WHERE id = ?',array($value['user_id']),1)['name'];
			echo '<div class="msg-chat">
				<span>'.$user_msg.':</span>
				<p>'.$value['msg'].'</p>
			</div><!--msg-chat-->';
			$_SESSION['last_id_chat'] = $value['id'];
		}
	}
?>