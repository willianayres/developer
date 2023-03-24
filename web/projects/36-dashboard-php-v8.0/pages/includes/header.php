<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Willian Joris Ayres" />
	<meta name="description" content="Descrição do Website!" />
	<meta name="keywords" content="protal,imobiliario,project,developer,website,,html,css,php" />
	<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10, minimum-scale=1.0" />
	<title>Portal Imobiliário</title>
	<link rel="icon" href="<?php path(); ?>favicon.ico" type="image/x-icon" />
	<?php Painel::loadCSS(array('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap'),'',0,1,1);?>
	<?php Painel::loadCSS(array('fontawesome'),'',0,1);?>
	<?php Painel::loadCSS(array('header','buildings'),'',0,1); ?>
</head>
<body>
	<base base="<?php path(); ?>" />
	<?php $parameters = \views\mainView::$par;?>
	<header>
		<?php
			$enterprises = \Painel::getData('tb_admin.enterprises','*',' ORDER BY order_id ASC',[],true,true);
		?>
		<div class="container">
			<div class="logo left"><a href="<?php path();?>">Portal Imóbi</a></div><!--logo-->
			<nav class="desktop right">
				<ul>
					<?php foreach($enterprises as $key => $value){?>

				    	<li><a href="<?php path(); echo $value['slug'];?>"><?php echo $value['name'];?></a></li>
					<?php } ?>
				</ul>
			</nav><!--desktop-->
			<nav class="mobile">
				<ul>
				    <li><a href="<?php path().$value['slug'];?>"><?php echo $value['name'];?></a></li>
				</ul>
			</nav><!--mobile-->
			<div class="clear"></div><!--clear-->
		</div><!--container-->
	</header>

	<section class="search-1">
		<div class="container">
			<h2>O que você procura?</h2>
			<input type="text" name="search-1-text" placeholder="Digite o que procura..." />
		</div><!--container-->
	</section><!--search-1-->

	<section class="search-2">
		<div class="container">
			<form action="<?php path();?>ajax/forms.php" method="post">
				<div class="form-group left w50">
					<label>Área mínima: (m²)</label>
					<input type="number" min="0" max="999999" step="100" name="area_min" placeholder="Digite a área mínima..." />
				</div><!--form-group-->
				<div class="form-group left w50">
					<label>Área máxima: (m²)</label>
					<input type="number" min="0" max="999999" step="100" name="area_max" placeholder="Digite a área máxima..." />
				</div><!--form-group-->
				<div class="form-group left w50">
					<label>Preço mínimo: (R$)</label>
					<input type="text" name="price_min" placeholder="Digite o preço mínimo..." />
				</div><!--form-group-->
				<div class="form-group left w50">
					<label>Preço máximo: (R$)</label>
					<input type="text" name="price_max" placeholder="Digite o preço máximo..." />
				</div><!--form-group-->
				<?php 
					if(isset($parameters['slug_enterprise'])){
						echo '<input type="hidden" name="slug_enterprise" value="'.$parameters['slug_enterprise'].'" />';
					}
				?>
				<div class="clear"></div><!--clear-->
			</form>
		</div><!--container-->
	</section><!--search-1-->