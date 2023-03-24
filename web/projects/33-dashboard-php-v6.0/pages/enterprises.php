<?php 
	$parameters = \views\mainView::$par;
	
?>
<section class="list-buildings">
	<div class="container">

		<h2 class="title-search">Listando <strong><?php echo count($parameters['buildings']);?> imóveis</strong> de <?php echo $parameters['name_enterprise'];?></h2>

		<?php 
			foreach($parameters['buildings'] as $key => $value){
				$buildng_img = \Painel::getData('tb_admin.buildings-images','img',' WHERE building_id = ?',array($value['id']),true)['img'];
		?>

		<div class="row-buildings">
			<div class="row1">
				<img alt="" src="<?php images();?>buildings/<?php echo $buildng_img;?>" />
			</div><!--row1-->
			<div class="row2">
				<p><i class="fas fa-signature"></i> Nome do Imóvel: <?php echo $value['name'];?></p>
				<p><i class="far fa-calendar-minus"></i> Preço do Imóvel: <?php echo 'R$ '.  \Painel::money($value['price']);?></p>
				<p><i class="fas fa-ruler-combined"></i> Área do Imóvel: <?php echo $value['area'];?></p>
			</div><!--row2-->
		</div><!--row-buildings-->
		<?php }?>
	</div><!--container-->
</section><!--list-buildings-->