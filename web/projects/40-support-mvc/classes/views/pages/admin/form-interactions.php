<h2><?php echo $info['msg'];?></h2>
<p>Clique <a href="<?php echo INCLUDE_PATH;?>call?token=<?php echo $info['call_id'];?>">aqui</a> para visualizar este chamado.</p>
<form method="post">
	<textarea name="msg" placeholder="Sua reposta..."?></textarea>
	
	<input type="hidden" name="id" value="<?php echo $info['id'];?>">
	<input type="hidden" name="email" value="<?php echo $info['email'];?>" />
	<input type="hidden" name="call_id" value="<?php echo $info['call_id'];?>" />
	<br />
	<input type="submit" name="awnser_interaction" value="Responder" />
</form>