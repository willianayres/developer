<!DOCTYPE html>
<html lang="pt-br">

	<head>

		<title>Dashboard</title>
		<meta charset="utf-8" />
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
		<link href="css/fontawesome.min.css" type="text/css" rel="stylesheet" />
		<link href="css/style.css" type="text/css" rel="stylesheet" />

	</head>

	<body>

		<div class="sidebar">

			<div class="sidebar__logo">
				<< Logomarca >>
			</div><!--sidebar__logo-->

			<div class="sidebar__menu">
				<ul>
					<li><i class="fas fa-clipboard-list"></i><a href=""> Painel</a></li>
					<li><i class="fas fa-th-large"></i><a href=""> Conteúdo</a></li>
					<li><i class="far fa-chart-bar"></i><a href=""> Estatísticas</a></li>
					<li><i class="fas fa-cog"></i><a href=""> Configurações</a></li>
					<li><i class="fas fa-question"></i><a href=""> Dúvidas</a></li>
					<li><i class="fas fa-user"></i><a href=""> Usuário</a></li>
				</ul>
			</div><!--sidebar__menu-->

		</div><!--sidebar-->

		<div class="main">

			<div class="main__header">

				<div class="main__header__pesquisa">
					<div class="pesquisa__icon"><i class="fas fa-search"></i></div><form><input type="text" /></form>
				</div><!--main__header__pesquisa-->

				<div class="main__header__alerta">
					<p>2</p>
					<i class="fas fa-bell"></i>
				</div><!--main__header__alerta-->

				<div class="main__header__nome">
					<i class="fas fa-align-justify"></i>
				</div><!--main__header__nome-->

				<div class="clear"></div><!--clear-->

			</div><!--main__header-->

			<div class="main__contentleft">

				<div class="contentleft__panel">
					<h2>Olá Willian, Seja bem vindo!</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
				</div><!--contentleft__panel-->

				<div style="width:49%;margin-right:1%;" class="contentleft__panel">
					<h2>Aviso importante: Número 1</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
				</div><!--contentleft__panel-->

				<div style="width:49%;margin-left:1%;" class="contentleft__panel">
					<h2>Aviso importante: Número 2</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
				</div><!--contentleft__panel-->

				<div class="contentleft__panel">
					<h2>O que acaba de acontecer com essa página:</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
				</div><!--contentleft__panel-->

				<div class="clear"></div><!--clear-->

			</div><!--main__contentleft-->


			<div class="contentright">

				<div class="contentright__topo">
					<h2>Últimas atualizações</h2>
				</div><!--contentright__topo-->
				<br />

				<div class="contentright__textos">
					<div class="circle"></div>
					<h2>Há 2 minutos</h2>
					<p>A página <b>Sobre</b> foi inserida por Desenvolvedor.</p>
				</div><!--contentright__textos-->

				<div class="contentright__textos">
					<div class="circle"></div>
					<h2>Há 5 minutos</h2>
					<p>A página <b>Conteúdo</b> foi editada por Desenvolvedor.</p>
				</div><!--contentright__textos-->

				<div class="contentright__textos">
					<div class="circle"></div>
					<h2>Há 7 minutos</h2>
					<p>A página <b>Painel</b> foi atualizada por Desenvolvedor.</p>
				</div><!--contentright__textos-->

			</div><!--contentright-->

			<div class="clear"></div><!--clear-->

		</div><!--main-->

		<script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/functions.js" type="text/javascript"></script>

	</body>

</html>