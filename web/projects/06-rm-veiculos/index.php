<!DOCTYPE html>
<html lang="pt-br">

	<head>

		<title>Projeto 05</title>
		<meta charset="utf-8" />
		<meta name="author" content="Willian Ayres" />
		<meta name="description" content="Descrição do WebSite." />
		<meta name="keywords" content="palavras,chave,para,o,projeto,05" />
		<meta name="viewport" content="widht=device-width, initial-scale=1.0, maximum-scale=1.0" />
		<link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap"rel="stylesheet" />
		<link rel="shortcut icon" type="image-x/png" href="imagens/icone.ico" />
		<link href="css/index.css" type="text/css" rel="stylesheet" />
		
	</head>

	<body>

	<header style="border-bottom: 3px solid #EB2D2D;">

		<div class="container">
		<div class="logo">
			<img src="imagens/logo.jpg" />
		</div><!--logo-->

		<nav class="desktop">
			<ul>
				<li><a href="home">Home</a></li>
				<li><a href="venda">Venda</a></li>
				<li><a href="galeria">Galeria</a></li>
				<li><a href="eventos">Eventos</a></li>
				<li><a href="sobre">Sobre</a></li>
				<li><a goto="contato" href="">Contato</a></li>
			</ul>
		</nav><!--desktop-->

		<nav class="mobile">
			<ul>
				<li><a href="home">Home</a></li>
				<li><a href="venda">Venda</a></li>
				<li><a href="galeria">Galeria</a></li>
				<li><a href="eventos">Eventos</a></li>
				<li><a href="sobre">Sobre</a></li>
				<li><a goto="contato" href="">Contato</a></li>
			</ul>
		</nav><!--mobile-->

		<div class="clear"></div>
		</div><!--container-->
	</header>
	<?php
		if(isset($_GET['url'])){
			if(file_exists($_GET['url']).'.html'){
				include($_GET['url'].'.html');
			}else{
				include('404.html');
			}
		}else{
			include('home.html');
		}
	?>
	<footer>
		<div class="container">
		<nav>
			<ul>
				<li><a href="home">Home</a></li>
				<li><a href="venda">Venda</a></li>
				<li><a href="galeria">Galeria</a></li>
				<li><a href="eventos">Eventos</a></li>
				<li><a href="sobre">Sobre</a></li>
				<li><a goto="contato" href="">Contato</a></li>
			</ul>
		</nav>
		<p>Todos os direitos reservados</p>
		<div class="clear"></div>
		</div><!--container-->
	</footer>

	<script src="js/jquery.js"></script>
	<script src="js/functions.js"></script>
	<script src="js/functions_individual.js"></script>
	<script src="js/functions_vendas.js"></script>

	</body>

</html>