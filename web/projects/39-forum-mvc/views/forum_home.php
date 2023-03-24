<h2>Bem vindo ao nosso fórum!</h2>
<form method="post">
	<input type="text" name="forum_title" />
	<input type="submit" name="register_forum" value="Cadastrar" />
</form>
<ul>
	<?php
		foreach($forums as $key => $value){
	?>
	<li><a href="<?php path(); echo $value['id'];?>"><?php echo $value['name'];?></a></li>
	<?php } ?>
</ul>