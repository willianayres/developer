<?php if(isset($_GET['loggout'])) Painel::loggout(); ?>
<?php $url = isset($_GET['url']) ? $_GET['url'] : 'home'; ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10, minimum-scale=1.0" />
		<link rel="icon" href="<?php pathPainel(); ?>favicon.ico" type="image/x-icon" />
		<?php Painel::loadCSS(array('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap'),'',true,true);?>
		<?php Painel::loadCSS(array('fontawesome','default','box'),'',true);?>
		<?php Painel::loadCSS(array('home'),array('','home'));?>
		<?php Painel::loadCSS(array('boxes','search'),array('list-clients','list-products','edit-product'));?>
		<?php Painel::loadCSS(array('pagination'),array('edit-client','edit-product','list-categories','list-clients','list-notices','list-products','list-services','list-slides','list-testimonies','payments'));?>
		<?php Painel::loadCSS(array('pdf'),array('payments'));?>
		<?php Painel::loadCSS(array('zebra-datepicker'),array('edit-client'));?>

		<title>Painel de Controle</title>
	</head>
	<body>
		<base base="<?php pathPainel(); ?>" />
		<div class="menu">
			<div class="wraper">
				<div class="user">
					<?php if($_SESSION['img'] == ''){ ?>
						<div class="avatar">
							<i class="fas fa-user"></i>
						</div><!--avatar-->
					<?php } else { ?>
						<div class="img">
							<img src="<?php pathPainel(); ?>uploads/users/<?php echo $_SESSION['img']; ?>" />
						</div><!--avatar-->
					<?php } ?>
					<div class="name">
						<p><?php echo $_SESSION['name']; ?></p>
						<p><?php echo Painel::getOffice($_SESSION['office']); ?></p>
					</div><!--name-->
				</div><!--user-->
				<div class="itens">
					<h2>Cadastro</h2>
					<a <?php Painel::selected('register-testimony');?> href="<?php pathPainel(); ?>register-testimony">Cadastrar Depoimento</a>
					<a <?php Painel::selected('register-service');?> href="<?php pathPainel();?>register-service">Cadastrar Serviço</a>
					<a <?php Painel::selected('register-slide');?> href="<?php pathPainel(); ?>register-slide">Cadastrar Slide</a>
					<h2>Gestão</h2>
					<a <?php Painel::selected('list-testimonies');?> href="<?php pathPainel();?>list-testimonies">Listar Depoimentos</a>
					<a <?php Painel::selected('list-services');?> href="<?php pathPainel(); ?>list-services">Listar Serviços</a>
					<a <?php Painel::selected('list-slides');?> href="<?php pathPainel(); ?>list-slides">Listar Slides</a>
					<h2>Configuração Geral</h2>
					<a <?php Painel::selected('edit-site');?> href="<?php pathPainel(); ?>edit-site">Editar Site</a>
					<h2>Gestão Noticias</h2>
					<a <?php Painel::selected('register-notice');?> href="<?php pathPainel(); ?>register-notice">Cadastrar Noticia</a>
					<a <?php Painel::selected('register-category');?> href="<?php pathPainel(); ?>register-category">Cadastrar Categoria</a>
					<a <?php Painel::selected('list-notices');?> href="<?php pathPainel(); ?>list-notices">Listar Notícias</a>
					<a <?php Painel::selected('list-categories');?> href="<?php pathPainel(); ?>list-categories">Listar Categorias</a>
					<h2>Gestão de Clientes</h2>
					<a <?php Painel::selected('register-client');?> href="<?php pathPainel(); ?>register-client">Cadastrar Cliente</a>
					<a <?php Painel::selected('list-clients');?> href="<?php pathPainel(); ?>list-clients">Listar Clientes</a>
					<h2>Controle Fianceiro</h2>
					<a <?php Painel::selected('payments');?> href="<?php pathPainel(); ?>payments">Visualizar Pagamentos</a>
					<h2>Controle de Estoque</h2>
					<a <?php Painel::selected('register-product');?> href="<?php pathPainel(); ?>register-product">Cadastrar Produtos</a>
					<a <?php Painel::selected('list-products');?> href="<?php pathPainel(); ?>list-products">Listar Produtos</a>
					<h2>Administração do Painel</h2>
					<a <?php Painel::selected('edit-user');?> href="<?php pathPainel(); ?>edit-user">Editar Usuário</a>
					<a <?php Painel::selected('add-user');?> <?php Painel::checkPermissionMenu(2); ?> href="<?php pathPainel();?>add-user">Adicionar Usuários</a>
				</div><!--itens-->
			</div><!--wraper-->
		</div><!--menu-->

		<header>
			<div class="center">
				<div class="menu-button left">
					<i class="fas fa-bars"></i>
				</div><!--menu-button-->
				<div class="loggout right">
					<a <?php if(@$_GET['url'] == ''){echo 'class="home"';} ?> href="<?php pathPainel(); ?>"><i class="fas fa-home"></i> <span>Home</span></a>
					<a href="<?php pathPainel(); ?>?loggout"><i class="fas fa-sign-out-alt"></i> <span>Exit</span></a>
				</div><!--logout-->
				<div class="clear"></div><!--clear-->
			</div><!--center-->
		</header>

		<div class="container">
			<?php Painel::loadPage(); ?>
		</div><!--container-->
		
		<?php Painel::loadJS(array('jquery','constants','jquery.mask','main'),'',true,false);?>

		<?php Painel::loadJS(array('https://cdn.tiny.cloud/1/q90q8qr0geb48y34svlozlbs0dj12c9myzyry7zdzl2ubuus/tinymce/5/tinymce.min.js'),array('register-testimony','edit-testimony','register-service','edit-service','register-notice','edit-notice','edit-site'),false, true, array('referrerpolicy'=>'"origin"'));?>
		<?php Painel::loadJS(array('tinymce'),array('register-testimony','edit-testimony','register-service','edit-service','register-notice','edit-notice','edit-site'));?>

		<?php Painel::loadJS(array('ajax','jquery.ajaxform'),array('register-client','edit-client','list-clients','list-products'));?>
		<?php Painel::loadJS(array('helpermask'),array('register-client','edit-client'));?>
		<?php Painel::loadJS(array('payments','jquery.maskmoney','zebra.datepicker'), array('edit-client'));?>

	</body>
</html>