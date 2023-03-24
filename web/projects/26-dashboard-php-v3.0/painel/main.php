<?php if(isset($_GET['loggout'])) Painel::loggout(); ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=10, minimum-scale=1.0" />
		<link rel="icon" href="<?php pathPainel(); ?>favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" />
		<link rel="stylesheet" href="<?php path(); ?>css/fontawesome.css" />
		<link rel="stylesheet" href="<?php pathPainel(); ?>css/style.css" />
		<title>Painel de Controle</title>
	</head>

	<body>

		<?php $url = isset($_GET['url']) ? $_GET['url'] : 'home'; ?>

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
					<a <?php Painel::selected('list-categories');?> href="<?php pathPainel(); ?>list-categories">Listar Categorias</a>
					<h2>Gestão de Clientes</h2>
					<a <?php Painel::selected('register-client');?> href="<?php pathPainel(); ?>register-client">Cadastrar Cliente</a>
					<a <?php Painel::selected('list-clients');?> href="<?php pathPainel(); ?>list-clients">Listar Clientes</a>
					<h2>Administração do Painel</h2>
					<a <?php Painel::selected('edit-user');?> href="<?php pathPainel(); ?>edit-user">Editar Usuário</a>
					<a <?php Painel::selected('add-user');?> <?php Painel::checkPermissionMenu(2); ?> href="<?php echo INCLUDE_PATH_PAINEL;?>add-user">Adicionar Usuários</a>
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

		<script src="<?php path(); ?>js/jquery.js"></script>
		<script src="<?php path(); ?>js/constants.js"></script>
		<script src="<?php pathPainel(); ?>js/jquery.mask.js"></script>
		<script src="<?php pathPainel(); ?>js/main.js"></script>
		<script src="https://cdn.tiny.cloud/1/q90q8qr0geb48y34svlozlbs0dj12c9myzyry7zdzl2ubuus/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
		<script>
			tinymce.init({ 
				selector:'.tinymce',
				plugins: "a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker image",
				height:300,
				toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
				toolbar_mode: 'floating',
				tinycomments_mode: 'embedded',
				tinycomments_author: 'Author name'
			});
		</script>
		<?php Painel::loadJS(array('ajax.js','helpermask.js','jquery.ajaxform.js'),'register-client');?>
		<?php Painel::loadJS(array('ajax.js'),'list-clients');?>
		<?php Painel::loadJS(array('ajax.js','helpermask.js','jquery.ajaxform.js'),'edit-client');?>

	</body>
</html>