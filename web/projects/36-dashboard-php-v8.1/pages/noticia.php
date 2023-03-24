<?php
	$url_notice = explode('/', $_GET['url']);
	$check_category = \Painel::getData('tb_site.categories','*',' WHERE slug = ?',array($url_notice[1]),0);
	if($check_category->rowCount() == 0)
		\Painel::redirectPage(INCLUDE_PATH.'noticias');
	$check_category = $check_category->fetch();
	$post = \Painel::getData('tb_site.notices','*',' WHERE slug = ? AND category_id = ?',array($url_notice[2],$check_category['id']),0);
	if($post->rowCount() == 0)
		Painel::redirectPage(INCLUDE_PATH.'noticias');
	$post = $post->fetch();
?>
<section class="notice">
	<div class="center">
		<header>
			<h1><a href="<?php path();?>noticias/">Notícias</a> > <?php echo $post['date'];?> - <?php echo strip_tags($post['title']);?></h1>
		</header>
		<article>
			<img src="<?php images();?>notices/<?php echo $post['cape'];?>" />
			<?php echo $post['title']; ?>
			<?php echo $post['content']; ?>
		</article>
	</div><!--center-->
</section><!--notice-->