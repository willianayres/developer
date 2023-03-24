<?php include('config.php'); ?>
<?php Site::updateUsersOn(); ?>
<?php Site::countVisits(); ?>
<?php $info = Painel::getData('tb_site.config'); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title><?php echo $info['title']; ?></title>
		<meta charset="utf-8" />
		<meta name="author" content="Willian Joris Ayres" />
		<meta name="description" content="Descrição do Website!" />
		<meta name="keywords" content="projeto,projeto01,html,css,php" />
		<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10, minimum-scale=1.0" />
		<link rel="icon" href="<?php path(); ?>favicon.ico" type="image/x-icon" />
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" />
		<link rel="stylesheet" href="<?php path(); ?>css/fontawesome.css">
		<link rel="stylesheet" href="<?php path(); ?>css/index.css" />
		<link rel="stylesheet" href="<?php path(); ?>css/home.css" />
		<link rel="stylesheet" href="<?php path(); ?>css/notices.css" />
		<link rel="stylesheet" href="<?php path(); ?>css/404.css" />
		<link rel="stylesheet" href="<?php path(); ?>css/responsive.css" />
	</head>

	<body>

		<base base="<?php path(); ?>" />
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
			<img src="<?php images(); ?>ajax/<?php echo $info['ajax_image']; ?>" />
		</div><!--overlay-loading-->

		<header>

			<div class="center">
				<div class="logo left"><a href="<?php path(); ?>">Logomarca</a></div><!--logo-->
				<nav class="desktop right">
					<ul>
						<li><a title="Home" href="<?php path(); ?>">Home</a></li>
						<li><a title="Sobre" href="<?php path(); ?>sobre">Sobre</a></li>
						<li><a title="Serviços" href="<?php path(); ?>servicos">Serviços</a></li>
						<li><a title="Notícia" href="<?php path(); ?>noticias">Notícias</a></li>
						<li><a title="Contato" realtime="contato" href="<?php path(); ?>contato">Contato</a></li>
					</ul>
				</nav><!--desktop-->
				<nav class="mobile right">
					<div class="button"><i class="fas fa-bars"></i></div><!--button-->
					<ul>
						<li><a title="Home" href="<?php path(); ?>">Home</a></li>
						<li><a title="Sobre" href="<?php path(); ?>sobre">Sobre</a></li>
						<li><a title="Serviços" href="<?php path(); ?>servicos">Serviços</a></li>
						<li><a title="Notícia" href="<?php path(); ?>noticias">Notícias</a></li>
						<li><a title="Contato" realtime="contato" href="<?php path(); ?>contato">Contato</a></li>
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
						if($url_par != 'noticias'){
							$pag404 = true;
							include('pages/404.php');
						}
						else
							include('pages/noticias.php');
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

		<script src="<?php path(); ?>js/jquery.js"></script>
		<script src="<?php path(); ?>js/constants.js"></script>
		<script src="<?php path(); ?>js/menu.js"></script>
		<?php if($url == 'home' || $url == '' || $url == 'servicos' || $url == 'sobre'){ ?>
			<script src="<?php path(); ?>js/scroll.js"></script>
			<script src="<?php path(); ?>js/slider.js"></script>
			<script src="<?php path(); ?>js/specialities.js"></script>
		<?php } if(is_array($url) && strstr($url[0], 'noticias') !== false){ ?>
			<script src="<?php path(); ?>js/notices.js"></script>
		<?php } else { ?>
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyDHPNQxozOzQSZ-djvWGOBUsHkBUoT_qH4"></script>
			<script src="<?php path(); ?>js/map.js"></script>
			<script src="<?php path(); ?>js/form.js"></script>
		<?php } ?>
	</body>

</html>