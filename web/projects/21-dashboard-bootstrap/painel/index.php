<?php
	$pdo   = new PDO('mysql:host=localhost;dbname=bootstrap','root','');
	$about = $pdo->prepare("SELECT * FROM `tb_about`");
	$about->execute();
	$about = $about->fetch()['about'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="ID=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dashboard</title>
		<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
		<link href="css/index.css" type="text/css" rel="stylesheet" />

	</head>

	<body>
		
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">< Logomarca ></a>
				</div><!--navbar-header-->
				<div id="navbar" class="collapse navbar-collapse">
					<ul class="nav navbar-nav" id="ul-header">
						<li class="active"><a href="" page="edit-about">Editar Sobre</a></li>
						<li><a href="" page="register-member">Registrar Membro</a></li>
						<li><a href="" page="edit-members">Gerenciar Membros</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="?loggout"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span> Sair!</a></li>
					</ul>
				</div><!--nav-collapse -->
			</div><!--container-->
		</nav><!--navbar-fixed-top-->

		<header id="header">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<h2><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Painel de Controle</h2>
					</div><!--col-md-8-->
					<div class="col-md-4">
						<p><span class="glyphicon glyphicon-time" aria-hidden="true"></span> Seu último login foi em: 20/06/2021</p>
					</div><!--col-md-4-->
				</div><!--row-->
			</div><!--container-->
		</header>

		<main>
			
			<section class="bread">
				<div class="container">
					<ol class="breadcrumb">
						<li class="active">Home</li>
					</ol><!--breadcrumb-->
				</div><!--container-->
			</section><!--bread-->

			<section class="main">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="list-group">
								<a class="list-group-item active color" href="" page="edit-about"><span class="glyphicon glyphicon-book"></span> Editar Sobre</a>
								<a class="list-group-item" href="" page="register-member"><span class="glyphicon glyphicon-plus"></span> Registrar Membro</a>
								<a class="list-group-item" href="" page="edit-members"><span class="glyphicon glyphicon-user"></span> Gerenciar Membros <span class="badge">2</span></a>
							</div><!--list-group-->
						</div><!--col-md-3-->
						<div class="col-md-9">
							<?php
								if(isset($_POST['edit-about'])){
									$about = $_POST['about'];
									$pdo->exec("DELETE FROM `tb_about`");
									$sql   = $pdo->prepare("INSERT INTO `tb_about` VALUES (null,?)");
									$sql->execute(array($about));
									echo '<div class="alert alert-success" role="alert">O código HTML <b>Sobre</b> foi editado com sucesso!</div>';
									$about = $pdo->prepare("SELECT * FROM `tb_about`");
									$about->execute();
									$about = $about->fetch()['about'];
								}else if(isset($_POST['register-member'])){
									$name = $_POST['name'];
									$text = $_POST['text'];
									$sql   = $pdo->prepare("INSERT INTO `tb_members` VALUES (null,?,?)");
									$sql->execute(array($name,$text));
									echo '<div class="alert alert-success" role="alert">O membro da equipe foi registrado com sucesso!</div>';
								}
							?>
							<div class="panel panel-default" id="edit-about">
								<div class="panel-heading color">
									<h3 class="panel-title">Sobre</h3>
								</div><!--panel-heading-->
								<div class="panel-body">
									<form method="post">
										<div class="form-group">
											<label for="about">Código HTML:</label>
											<textarea class="form-control" name="about"><?php echo $about; ?></textarea>
										</div><!--form-group-->
										<input name="edit-about" type="hidden" value="" />
										<button type="submit" class="btn btn-default" name="action">Enviar</button>
									</form>
								</div><!--panel-body-->
							</div><!--panel-default-->

							<div class="panel panel-default" id="register-member">
								<div class="panel-heading color">
									<h3 class="panel-title">Registrar Membro:</h3>
								</div><!--panel-heading-->
								<div class="panel-body">
									<form method="post">
										<div class="form-group">
											<label for="name">Nome:</label>
											<input class="form-control" id="name" name="name" type="text" value="" />
										</div><!--form-group-->
										<div class="form-group">
											<label for="text">Descrição:</label>
											<textarea class="form-control" id="text" name="text"></textarea>
										</div><!--form-group-->
										<input name="register-member" type="hidden" value="" />
										<button class="btn btn-default" name="action" type="submit">Enviar</button>
									</form>
								</div><!--panel-body-->
							</div><!--panel-default-->

							<div class="panel panel-default" id="edit-members">
								<div class="panel-heading color">
									<h3 class="panel-title">Membros da Equipe:</h3>
								</div><!--panel-heading-->
								<div class="panel-body">
									<table class="table">
										<thead>
											<tr>
												<th>ID:</th>
												<th>Nome do membro:</th>
												<th>Excluir:</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$members = $pdo->prepare("SELECT `id`,`name` FROM `tb_members`");
												$members->execute();
												$members = $members->fetchAll();
												foreach($members as $key => $value){
											?>
												<tr>
													<td><?php echo $value['id'] ?></td>
													<td><?php echo $value['name'] ?></td>
													<td><button class="btn btn-sm btn-danger del" id_member="<?php echo $value['id'];?>" type="button"><span class="glyphicon glyphicon-trash"></span></button></td>
												</tr>
											<?php } ?>
										</tbody>
									</table><!--table-->				
								</div><!--panel-body-->
							</div><!--panel-default-->
						</div><!--col-md-9-->
					</div><!--row-->
				</div><!--container-->
			</section><!--main-->

		</main>
		

		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js" type="text/javascript"></script>
		<script src="js/functions.js" type="text/javascript"></script>

	</body>

</html>