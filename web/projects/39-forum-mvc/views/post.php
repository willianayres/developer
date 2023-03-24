<h2>Você está no fórum: <a href="<?php path();?>">Fórum</a> > <a href="<?php path();echo $forum_id?>"><?php echo $forum_name;?></a> > <?php echo $topic_name;?></h2>
<?php
	foreach($get_posts as $key => $value){
		echo '<h3>'.$value['username'].'</h3>';
		echo '<p>'.$value['message'].'</p>';
		echo '<hr />';
	}
?>
<h3 style="background-color: rgb(225,225,225);">Responda a este tópico:</h3>
<form method="post">
	<input style="width:100%;height:40px;margin:10px 0;" type="text" name="username" />
	<textarea style="width:100%;height:120px;margin:10px 0;" name="message"></textarea>
	<input type="hidden" name="topic_id" value="<?php echo $topic_id;?>" />
	<input type="submit" name="register_post" value="Enviar" />
</form>