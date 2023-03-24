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
		<title>BootStrap</title>
		<link href="css/bootstrap.min.css" type="text/css" rel="stylesheet" />
		<link href="css/index.css" type="text/css" rel="stylesheet" />

	</head>

	<body>
		
		<header>
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
						<ul class="nav navbar-nav navbar-right">
							<li class="active"><a href="#">Home</a></li>
							<li><a href="sobre">Sobre</a></li>
							<li><a href="contato">Contato</a></li>
						</ul>
					</div><!--nav-collapse -->
				</div><!--container-->
			</nav><!--navbar-fixed-top-->
		</header>

		<main>
		
			<section class="banner">
				<div class="overlay"></div>
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<h2>< Logomarca ></h2>
							<p>Empresa voltada para desenvolvimento web e marketing digital<p>
							<a href="">Saiba Mais!</a>
						</div><!--col-md-12-->
					</div><!--row-->
				</div>
			</section><!--banner-->

			<section class="register">
				<div class="container">
					<div class="row text-center">
						<div class="col-md-6">
							<h2><span class="glyphicon glyphicon-saved"></span> Entre na nossa lista!</h2>
						</div><!--col-md-6-->
						<div class="col-md-6">
							<form method="post">
								<input type="text" name="name" /><input type="submit" name="action" value="Enviar" />
							</form>
						</div><!--col-md-6-->
					</div><!--row-->
				</div><!--container-->
			</section><!--register-->

			<section class="testimony text-center">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<h2>Depoimento</h2>
							<blockquote>
								<p class="mb-0">"Excepteur in elit consequat quis enim ea pariatur ullamco fugiat magna aliquip ea sed occaecat cupidatat qui ut eiusmod sunt cillum ut id sed excepteur culpa enim ullamco anim. Lorem ipsum esse mollit dolore dolore mollit dolor aute eiusmod ut sed fugiat adipisicing dolore anim sint laborum dolore anim veniam in commodo adipisicing consectetur tempor non consectetur laboris laboris occaecat deserunt amet magna tempor pariatur aliqua enim."</p>
							</blockquote>
						</div><!--col-md-12-->
					</div><!--row-->
				</div><!--container-->
			</section><!--testimony-->

			<section class="differential text-center">
				<h2>Conheça nossa empresa</h2>
				<div class="container">
					<div class="row">
						<?php echo $about; ?>
					</div><!--row-->
				</div><!--container-->
			</section><!--differential-->

			<section class="members text-center">
				<h2>Equipe</h2>
				<div class="container">
					<div class="row">
						<?php
						$members = $pdo->prepare("SELECT * FROM `tb_members`");
						$members->execute();
						$members = $members->fetchAll();
							foreach($members as $key => $value){
						?>
						<div class="col-md-6">
							<div class="box">
								<div class="row">
									<div class="col-md-2">
										<div class="img">
											<div class="user"><span class="glyphicon glyphicon-user"></span></div><!--user-->
										</div><!--img-->
									</div><!--col-md-2-->
									<div class="col-md-10">
										<h3><?php echo $value['name']; ?></h3>
										<p><?php echo $value['text']; ?></p>
									</div><!--col-md-10-->
								</div><!--row-->
							</div><!--box-->
						</div><!--col-md-6-->

						<?php
							}
						?>
						
					</div><!--row-->
				</div><!--container-->
			</section><!--members-->

			<section class="contact">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h2>Fale conosco</h2>
							<form>
								<div class="form-group">
									<label for="name">Nome:</label>
									<input type="text" class="form-control" id="name" name="name" />
								</div><!--form-group-->
								<div class="form-group">
									<label for="email">E-mail:</label>
									<input type="email" class="form-control" id="email" id="email" />
								</div><!--form-group-->
								<div class="form-group">
									<label for="msn">Mensagem:</label>
									<textarea class="form-control" id="msn" name="msn"></textarea>
								</div><!--form-group-->
								<button type="submit" class="btn btn-primary">Enviar</button>
							</form>
						</div><!--col-md-6-->
						<div class="col-md-6">
							<h2>Nossos planos</h2>
							<table class="table">
								<thead>
									<tr>
										<th>Plano Semanal</th>
										<th>Plano Mensal</th>
										<th>Plano Anual</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>R$  99,00</td>
										<td>R$ 299,00</td>
										<td>R$ 399,00</td>
									</tr>
									<tr>
										<td>R$  99,00</td>
										<td>R$ 299,00</td>
										<td>R$ 399,00</td>
									</tr>
									<tr>
										<td>R$  99,00</td>
										<td>R$ 299,00</td>
										<td>R$ 399,00</td>
									</tr>
								</tbody>
							</table><!--table-->
						</div><!--col-md-6-->
					</div><!--row-->
				</div><!--container-->
			</section><!--contact-->

		</main>

		<footer class="text-center">
			<p>Todos os direitos reservados!</p>
		</footer>

		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js" type="text/javascript"></script>

	</body>

</html>