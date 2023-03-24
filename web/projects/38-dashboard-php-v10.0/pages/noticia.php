<?php
	$url = $_GET['url'];

	$url_notice = explode('/', $_GET['url']);
	
	$check_category = \Painel::getData('tb_site.categories','*',' WHERE slug = ?',array($url_notice[1]),0);
	if($check_category->rowCount() == 0)
		\Painel::redirectPage(INCLUDE_PATH.'noticias');
	$check_category = $check_category->fetch();
	$post = \Painel::getData('tb_site.notices','*',' WHERE slug = ? AND category_id = ?',array($url_notice[2],$check_category['id']),0);
	if($post->rowCount() == 0)
		\Painel::redirectPage(INCLUDE_PATH.'noticias');
	$post = $post->fetch();
?>
<section class="notice">
	<div class="center">
		<header>
			<h1><a href="<?php path();?>noticias/">Notícias</a> > <a href="<?php path();echo $url_notice[0].'/'.$url_notice[1];?>"><?php echo ucfirst($url_notice[1]);?></a> > <?php echo $post['date'];?> - <?php echo strip_tags($post['title']);?></h1>
		</header>
		<article>
			<img src="<?php images();?>notices/<?php echo $post['cape'];?>" />
			<?php echo $post['title'];?>
			<?php echo $post['content'];?>
		</article>
		<?php
			if(\Painel::logged(0)){
		?>
			<?php
				// Insert a comment in Database.
				if(isset($_POST['add_comment'])){
					$username = $_SESSION['name_site'];
					$comment = $_POST['message'];
					$notice_id = $_POST['notice_id'];
					if(\Painel::insertData(array('table'=>'tb_site.comments','username'=>$username,'notice_id'=>$notice_id,'comment'=>$comment),0))
						\Painel::alert('success','O comentário foi inserido com sucesso!');
					else
						\Painel::alert('error','Ocorreu um erro ao inserir o comentário!');
				}
			?>
			<?php
				// Insert a comment response in Database.
				if(isset($_POST['awnser_comment'])){
					$comment_id = $_POST['comment_id'];
					$username = $_SESSION['name_site'];
					$notice_id = $_POST['notice_id'];
					$comment = $_POST['message'];
					if(\Painel::insertData(array('table'=>'tb_site.comments-awnsers','comment_id'=>$comment_id,'username'=>$username,'notice_id'=>$notice_id,'comment'=>$comment),0)){
						//header('Location: '.INCLUDE_PATH.$url);
						//die();
						echo 'ok';
					}
				}
			?>
			<h2 class="comment">Faça um comentário <i class="fas fa-comment"></i></h2>
			<form method="post">
				<input disabled type="text" name="name" value="<?php echo $_SESSION['name_site'];?>" />
				<input type="hidden" name="notice_id" value="<?php echo $post['id'];?>" />
				<textarea name="message" placeholder="Seu comentário..."></textarea>
				<input type="submit" name="add_comment" value="Comentar" />
			</form>
			<h2 class="comment">Comentários existentes <i class="fas fa-comment"></i></h2>
			<?php
				$total_coments = \Painel::getData('tb_site.comments','*',' WHERE notice_id = ?',array($post['id']),0,0)->rowCount(); 
				$comments = \Painel::getData('tb_site.comments','*',' WHERE notice_id = ? LIMIT 5',array($post['id']),0,0);
				$comments = $comments->fetchAll();
				foreach($comments as $key => $value){
			?>
				<div id="<?php echo $value['id'];?>" class="comment-notice">
					<h3><?php echo $value['username'];?></h3>
					<p><?php echo $value['comment'];?></p>
					<div class="box-awnsers"></div><!--box-awnsers-->
					<?php
						$awnser_comments = \Painel::getData('tb_site.comments-awnsers','*',' WHERE comment_id = ?',array($value['id']),0,0);
						if($awnser_comments->rowCount() > 0){
					?>
						<form class="show-awnsers" method="post">
							<input type="hidden" name="comment_id" value="<?php echo $value['id'];?>" />
							<input type="submit" name="show-awnsers" value ="Ver Respostas" />
						</form>
					<?php } ?>
					<button class="awnser"><i class="fas fa-reply"></i> Responder</button>
					
					<form class="awnser" method="post">
						<input type="hidden" name="name" value="<?php echo $_SESSION['name_site'];?>" />
						<input type="hidden" name="notice_id" value="<?php echo $post['id'];?>" />
						<textarea name="message" placeholder="Seu comentário..."></textarea>
						<input type="hidden" name="comment_id" value="<?php echo $value['id'];?>" />
						<input type="submit" name="awnser_comment" value="Responder" />
					</form>
					
				</div><!--comment-notice-->
			<?php } ?>
			<?php if($total_coments > 5){ ?>
				<form class="more">
					<input type="hidden" name="amount" value="1" />
					<input type="hidden" name="notice_id" value="<?php echo $post['id'];?>" />
					<input type="submit" name="more" value="Mostrar mais..." />
				</form>
			<?php } ?>
		<?php }else{ ?>
			<div class="no-login">
				<p><i class="fas fa-times"></i> Você precisa estar logado para comentar, <a href="<?php path();?>login">clique aqui</a> para efetuar o login.</p>
			</div><!--no-login-->
		<?php } ?>
	</div><!--center-->
</section><!--notice-->