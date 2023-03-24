<h2><?php echo $info['msg'];?></h2>
<form method="post">
	<textarea name="msg" placeholder="Sua reposta..."?></textarea>
	<input type="hidden" name="token" value="<?php echo $info['token'];?>">
	<input type="hidden" name="email" value="<?php echo $info['email'];?>">
	<br />
	<input type="submit" name="awnser" value="Responder" />
</form>