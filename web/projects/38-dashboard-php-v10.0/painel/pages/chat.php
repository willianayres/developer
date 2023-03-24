<div class="box">
	<h2><i class="fas fa-comments"></i> Chat Online</h2>
	<div class="box-chat">
		<?php
			$messages = \Painel::getData('tb_admin.chat','*',' ORDER BY id DESC LIMIT 10',[],1,1);
			$messages = array_reverse($messages);
			foreach($messages as $key => $value){
				$user_msg = \Painel::getData('tb_admin.users','name',' WHERE id = ?',array($value['user_id']),1)['name'];
				$last_id = $value['id'];
		?>
		<div class="msg-chat">
			<span><?php echo $user_msg;?>:</span>
			<p><?php echo $value['msg'];?></p>
		</div><!--msg-chat-->
		<?php
			if(isset($_SESSION['last_id_chat']))
				$last_id = $_SESSION['last_id_chat'];
			}
		?>
	</div><!--box-chat-->
	<form action="<?php pathPainel();?>ajax/chat.php" method="post">
		<div class="group">
			<textarea name="msg"></textarea>
		</div><!--group-->
		<div class="group">
			<input type="submit" name="send" value="Enviar" />
		</div><!--group-->
	</form>
</div><!--box-->