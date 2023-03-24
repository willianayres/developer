<form method="post">
	<br />
	<textarea name="msg" placeholder="Resposta..." required></textarea>
	<br />
	<input type="hidden" name="token" value="<?php echo $info['token'];?>" />
	<input type="submit" name="call_response" value="Enviar" />
</form>