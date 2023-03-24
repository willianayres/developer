<section class="one-banner">
	<?php
		$slides = \Painel::getData('tb_site.slides','*',' ORDER BY order_id ASC LIMIT 0,3',[],1,1);
		foreach($slides as $key => $value){
	?>
		<div <?php echo 'style = background-image:url("'.IMAGES.'slides//'.$value['slide'].'"); '; ?>class="banner-single"></div><!--banner-single-->
	<?php } ?>
	<div class="overlay">
		<div class="center">
			<form class="form-ajax" method="post">
				<h2>Qual o seu melhor e-mail?</h2>
				<input type="email" name="email" required />
				<input type="hidden" name="identifier" value="form_home" />
				<input type="submit" name="action" value="Cadastrar!" />
			</form>
		</div><!--center-->
		<div class="bullets"></div><!--bullets-->
	</div><!--overlay-->
</section><!--one-banner-->
<section class="two-description">
	<div class="center">
		<div id="sobre" class="width-100 left">
			<h2><img src="<?php images();?>site/<?php echo $info['author_image'];?>" /> <?php echo $info['author_name'];?></h2>
			<p><?php echo $info['author_description'];?></p>
		</div><!--width-100-->
		<div class="clear"></div><!--clear-->
	</div><!--center-->
</section><!--two-description-->
<section class="three-specialties">
	<div class="center">			
		<h2 class="title">Especialidades</h2>
		<?php 
			for($i=1; $i<4; $i++){
				$icon = "icon_".$i;
				$icon_title = "icon_title_".$i;
				$icon_text = "icon_text_".$i;
		?>
				<div class="specialties width-33 left">
					<h3><i class="<?php echo $info[$icon];?>"></i></h3>
					<h4><?php echo $info[$icon_title];?></h4>
					<p><?php echo $info[$icon_text];?></p>
				</div><!--specialties-box-->
		<?php } ?>
		<div class="clear"></div><!--clear-->
	</div><!--center-->
</section><!--three-specialties-->
<section class="four-extras">
	<div class="center">
		<div class="a1 width-50 left">
			<h2 class="title">Depoimentos dos nossos clientes:</h2>
			<?php
				$testimonies = \Painel::getData('tb_site.testimonies','*',' ORDER BY order_id ASC LIMIT 0,3',[],1,1);
				foreach($testimonies as $key => $value){
			?>
				<div class="deposition">
					<p class="description"><?php echo $value['testimony'];?></p>
					<p class="author"><?php echo $value['name'].' - '.$value['date'];?></p>
				</div><!--deposition-->
			<?php } ?>
		</div><!--width-50-->
		<div class="a2 width-50 left">
			<h2 class="title">Serviços</h2>
			<div id="servicos" class="services">
				<ul>
					<?php
						$services = \Painel::getData('tb_site.services','*',' ORDER BY order_id ASC LIMIT 0,3',[],1,1);
						foreach($services as $key => $value){
					?>
							<li><?php echo $value['service'];?></li>
					<?php } ?>
				</ul>
			</div><!--services-->
		</div><!--width-50-->
		<div class="clear"></div><!--clear-->
	</div><!--center-->
</section><!--four-extras-->