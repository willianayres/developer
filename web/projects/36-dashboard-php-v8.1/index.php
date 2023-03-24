<?php
	include('config.php');
	\Site::updateUsersOn();
	\Site::countVisits();
	$info = \Painel::getData('tb_site.config');
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>	
		<meta charset="utf-8" />
		<meta name="author" content="Willian Joris Ayres" />
		<meta name="description" content="Descrição do Website!" />
		<meta name="keywords" content="projeto,projeto01,html,css,php" />
		<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10, minimum-scale=1.0" />
		<link rel="icon" href="<?php path();?>favicon.ico" type="image/x-icon" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<?php \Painel::loadCSS(array('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap'),[],0,1,1);?>
		<?php \Painel::loadCSS(array('fontawesome','index','home','404'),[],0,1);?>
		<?php Painel::loadCSS(array('notices'),array('noticias'),0,1); ?>
		<?php Painel::loadCSS(array('imoveis'),array('imoveis'),0,1); ?>
		<title><?php echo $info['title'];?></title>
	</head>

	<body>
		<base base="<?php path();?>" />
		<?php
			$url = isset($_GET['url']) ? $_GET['url'] : 'home';
			switch ($url) {
				case 'sobre':
					echo '<target target="sobre" />';
					break;
				case 'servicos':
					echo '<target target="servicos" />';
					break;
			}
		?>
		<div class="overlay-loading">
			<img src="<?php images();?>ajax/<?php echo $info['ajax_image'];?>" />
		</div><!--overlay-loading-->
		<header>
			<div class="center">
				<div class="logo left"><a href="<?php path();?>">Logomarca</a></div><!--logo-->
				<nav class="desktop right">
					<ul>
						<li><a title="Home" href="<?php path();?>">Home</a></li>
						<li><a title="Sobre" href="<?php path();?>sobre">Sobre</a></li>
						<li><a title="Serviços" href="<?php path();?>servicos">Serviços</a></li>
						<li><a title="Notícia" href="<?php path();?>noticias">Notícias</a></li>
						<li><a title="Imóveis" href="<?php path();?>imoveis">Imóveis</a></li>
						<li><a title="Contato" realtime="contato" href="<?php path();?>contato">Contato</a></li>
					</ul>
				</nav><!--desktop-->
				<nav class="mobile right">
					<div class="button"><i class="fas fa-bars"></i></div><!--button-->
					<ul>
						<li><a title="Home" href="<?php path();?>">Home</a></li>
						<li><a title="Sobre" href="<?php path();?>sobre">Sobre</a></li>
						<li><a title="Serviços" href="<?php path();?>servicos">Serviços</a></li>
						<li><a title="Notícia" href="<?php path();?>noticias">Notícias</a></li>
						<li><a title="Imóveis" href="<?php path();?>imoveis">Imóveis</a></li>
						<li><a title="Contato" realtime="contato" href="<?php path();?>contato">Contato</a></li>
					</ul>
				</nav><!--mobile-->
				<div class="clear"></div><!--clear-->
			</div><!--center-->
		</header>
		<div class="container">
			<?php
				if(file_exists('pages/'.$url.'.php'))
					include('pages/'.$url.'.php');
				else{
					if($url != 'sobre' && $url != 'servicos'){
						$url_par = explode('/', $url)[0];
						if($url_par != 'noticias' && $url_par != 'imoveis'){
							$pag404 = true;
							include('pages/404.php');
						}else{
							if($url_par == 'noticias')
								include('pages/noticias.php');
							else
								include('pages/imoveis.php');
						}
					}else
						include('pages/home.php');
				}
			?>
		</div><!--container-->
		<footer <?php if(isset($pag404) && $pag404 == true) echo 'class="fixed"'?>>
			<div class="center">
				<p>Todos os direitos reservados</p>
			</div><!--center-->
		</footer>
		<?php \Painel::loadJS(array('jquery','constants'),[],0,1);?>
		<?php \Painel::loadJS(array('menu'),[],0,1);?>
		<?php \Painel::loadJS(array('scroll','slider','specialities','form'),array('home','','servicos','sobre'),0,0);?>
		<?php \Painel::loadJS(array('jquery.maskmoney','jquery.ajaxform'),array('imoveis'),1,1);?>
		<?php \Painel::loadJS(array('imoveis'),array('imoveis'),0,1);?>
		<?php \Painel::loadJS(array('map'),array('contato'),0,0);?>
		<?php \Painel::loadJS(array('notices'),array('notices'),0,0);?>
		<?php \Painel::loadJS(array('https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4'),array('contato'),0,0,1);?>	
	</body>
</html>