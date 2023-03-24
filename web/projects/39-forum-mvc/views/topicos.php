<h2>Você está no fórum: <a href="<?php path();?>">Fórum</a> > <u><?php echo $forum_name;?></u></h2>
<form method="post">
	<input type="text" name="topic_title" />
	<input type="hidden" name="forum_id" value="<?php echo $forum_id;?>" />
	<input type="submit" name="register_topic" value="Cadastrar" />
</form>
<ul>
	<?php
		foreach($topics as $key => $value){
	?>
	<li><a href="<?php path(); echo $forum_id.'/'.$value['id'];?>"><?php echo $value['name'];?></a></li>
	<?php } ?>
</ul>