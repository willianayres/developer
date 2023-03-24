<?php
	$url = explode('/', $_GET['url']);
	if(!isset($url[1])){
		$buildings = \Painel::getData('tb_admin.buildings','*','',[],1,1);
	}else{
		$enterprise_id = \Painel::getData('tb_admin.enterprises','id',' WHERE slug = ?',array(@$url[1]),1)['id'];
		$buildings = \Painel::getData('tb_admin.buildings','*',' WHERE enterprise_id= ?',array($enterprise_id),1,1);
	}
?>
<section class="header-buildings">
	<?php
		$enterprises = \Painel::getData('tb_admin.enterprises','*',' ORDER BY order_id ASC',[],true,true);
	?>
	<div class="center">
		<p prev><i class="fas fa-angle-double-left"></i></p>
		<nav class="desktop">
			<ul>
				<?php foreach($enterprises as $key => $value){ ?>
			    	<li><a href="<?php path(); echo 'imoveis/'.$value['slug'];?>"><?php echo $value['name'];?></a></li>
				<?php } ?>
			</ul>
		</nav><!--desktop-->
		<p next><i class="fas fa-angle-double-right"></i></p>
		<div class="clear"></div><!--clear-->
	</div><!--center-->
</section><!--header-buildings-->

<section class="search-1">
	<div class="center">
		<h2><i class="fas fa-search"></i> O que você procura?</h2>
		<input type="text" name="search-1-text" placeholder="Digite o que procura..." />
	</div><!--center-->
</section><!--search-1-->

<section class="search-2">
	<div class="center">
		<form action="<?php path();?>ajax/buildings.php" method="post">
			<div class="form-group left width-50">
				<label><i class="fas fa-ruler"></i> Área mínima: (m²)</label>
				<input type="number" min="0" max="999999" step="100" name="area_min" placeholder="Digite a área mínima..." />
			</div><!--form-group-->
			<div class="form-group left width-50">
				<label><i class="fas fa-ruler"></i> Área máxima: (m²)</label>
				<input type="number" min="0" max="999999" step="100" name="area_max" placeholder="Digite a área máxima..." />
			</div><!--form-group-->
			<div class="form-group left width-50">
				<label><i class="fas fa-dollar-sign"></i> Preço mínimo: (R$)</label>
				<input type="text" name="price_min" placeholder="Digite o preço mínimo..." />
			</div><!--form-group-->
			<div class="form-group left width-50">
				<label><i class="fas fa-dollar-sign"></i> Preço máximo: (R$)</label>
				<input type="text" name="price_max" placeholder="Digite o preço máximo..." />
			</div><!--form-group-->
			<?php 
				if(isset($url[1])){
					echo '<input type="hidden" name="slug_enterprise" value="'.@$url[1].'" />';
				}
			?>
			<div class="clear"></div><!--clear-->
		</form>
	</div><!--center-->
</section><!--search-1-->
<section class="list-buildings">
	<div class="center">
		<h2 class="title-search">Listando <strong><?php echo count($buildings)?> imóveis</strong></h2>

		<?php 
			foreach($buildings as $key => $value){
				$buildng_img = \Painel::getData('tb_admin.buildings-images','img',' WHERE building_id = ?',array($value['id']),true)['img'];
		?>

		<div class="row-buildings">
			<div class="row1">
				<img alt="" src="<?php images();?>buildings/<?php echo $buildng_img;?>" />
			</div><!--row1-->
			<div class="row2">
				<p><i class="fas fa-signature"></i> Nome do Imóvel: <?php echo $value['name'];?></p>
				<p><i class="far fa-calendar-minus"></i> Preço do Imóvel: <?php echo 'R$ '.\Painel::money($value['price']);?></p>
				<p><i class="fas fa-ruler-combined"></i> Área do Imóvel: <?php echo $value['area'];?> m²</p>
			</div><!--row2-->
		</div><!--row-buildings-->
		<?php }?>
	</div><!--center-->
</section><!--list-buildings-->
