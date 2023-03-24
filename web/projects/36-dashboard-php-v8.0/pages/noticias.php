<?php
	$url = explode('/', $_GET['url']);
	if(!isset($url[2])){
		$category = \Painel::getData('tb_site.categories','*',' WHERE slug = ?',array(@$url[1]),1);
?>
<section class="header-notices">
	<div class="center">
		<h2><i class="far fa-newspaper"></i></h2>
		<h2>Acompanhe as últimas <b>notícias do portal</b></h2>
	</div><!--center-->
</section><!--header-notices-->
<section class="container-notices">
	<div class="center">
		<div class="sidebar left">
			<div class="box width-100">
				<h3><i class="fas fa-search"></i> Realizar uma busca:</h3>
				<form method="post">
					<input type="text" name="par" placeholder="O que deseja procurar?" required />
					<input type="submit" name="search" value="Pesquisar" />
				</form>
			</div><!--box-->
			<div class="box width-100">
				<h3><i class="fas fa-th-large"></i> Selecione a categoria:</h3>
				<form>
					<select name="category">
						<option value="" selected>Todas as categorias</option>
						<?php
							$categories = \Painel::getData('tb_site.categories','*','',[],1,1);
							foreach($categories as $key => $value){
						?>
							<option <?php if($value['slug'] == @$url[1]) echo 'selected';?> value="<?php echo $value['slug'];?>"><?php echo $value['name'];?></option>
						<?php } ?>
					</select>
				</form>
			</div><!--box-->
			<div class="box width-100">
				<h3><i class="fas fa-user"></i> Sobre o autor:</h3>
				<div class="author">
					<img src="<?php images(); ?>site/<?php echo $info['author_image'];?>" />
					<h3><?php echo $info['author_name'];?></h3>
					<p><?php echo substr($info['author_description'], 0, 300).' <a href="'.INCLUDE_PATH.'sobre">Ler mais</a>';?></p>
				</div><!--autor-->
			</div><!--box-->
		</div><!--sidebar-->
		<div class="notices left">
			<div class="header">
				<?php
					if(!isset($_POST['par'])){
						if(!isset($category['name']))
							echo '<h2>Visualizando todos os Posts</h2>';
						else
							echo '<h2>Visualizando Posts em <span>'.$category['name'].'</span></h2>';
					}else{
						echo '<h2><i class="fa fa-check"></i> Busca por: <i><u>'.$_POST['par'].'</u></i> realizada com sucesso!</h2>';
					}
					$query = "";
					$arr = array();
					if(isset($category['name'])){
						$query .= " WHERE category_id = ?";
						array_push($arr, @$category['id']);
					}
					if(isset($_POST['par'])){
						$search = $_POST['par']; 
						if(strstr($query, 'WHERE') !== false){
							$query .= " AND title LIKE '%$search%'";
						}else{
							$query .= " WHERE title LIKE '%$search%'";
						}
					}
					$qry = "";
					$arra = array();
					if(isset($category['name'])){
						$qry .= "WHERE category_id = ?";
						array_push($arra, @$category['id']);
					}
					if(isset($_POST['par'])){
						$search = $_POST['par'];
						if(strstr($qry, 'WHERE') !== false){
							$qry .= " AND title LIKE '%$search%'";
						}else{
							$qry .= " WHERE title LIKE '%$search%'";
						}
					}
					$tot_pages = \Painel::getData('tb_site.notices','*',$qry,$arra,0);
					$tot_pages = ceil($tot_pages->rowCount() / PER_PAGE);
					if(!isset($_POST['par'])){
						if(isset($_GET['page'])){
							$page = (int)$_GET['page'];
							if($page > $tot_pages)
								$page = 1;
							$query .= " ORDER BY order_id ASC LIMIT ".($page-1)*PER_PAGE.",".PER_PAGE;
						}else{
							$page = 1;
							$query .= " ORDER BY order_id ASC LIMIT 0,".PER_PAGE;
						}
					}else
						$query .= " ORDER BY order_id ASC";
					$notices = \Painel::getData('tb_site.notices','*',$query,$arr,1,1);
				?>
			</div><!--header-->
			<?php foreach($notices as $key => $value){ 
				$category_name = \Painel::getData('tb_site.categories','slug',' WHERE id = ?',array($value['category_id']),0);
				$category_name = $category_name->fetch()['slug'];
			?>
			<div class="box">
				<h2><?php echo date('d/m/Y',strtotime($value['date']));?> - <?php echo $value['title'];?></h2>
				<p><?php echo substr(strip_tags($value['content']), 0, 400); ?></p>
				<a href="<?php path();?>noticias/<?php echo $category_name;?>/<?php echo $value['slug'];?>">Ler mais</a>
			</div><!--box-->
			<?php }?>
			<div class="pagination">
				<?php
					if(!isset($_POST['par'])){
						for($i=1; $i<=$tot_pages; $i++){
							$cat_str = (isset($category['name'])) ? '/'.$category['slug'] : '';
							if($page == $i)
								echo '<a class="sel" href="'.INCLUDE_PATH.'noticias'.$cat_str.'?page='.$i.'">'.$i.'</a>';
							else
								echo '<a href="'.INCLUDE_PATH.'noticias'.$cat_str.'?page='.$i.'">'.$i.'</a>';
						}
					}
				?>
			</div><!--pagination-->
		</div><!--notices-->
		<div class="clear"></div><!--clear-->
	</div><!--center-->
</section><!--container-notices-->
<?php } else { include('noticia.php');} ?>