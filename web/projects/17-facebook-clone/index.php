<!DOCTYPE html>
<html lang="pt-br">
	<head>

		<title>Facebook</title>
		<meta charset="utf-8" />
		<meta name="author" content="Willian" />
		<meta name="description" content="Descrição para o meu site." />
		<meta name="keywords" content="palavras-chave,separadas,por,vírgula" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, 
		maximum-scale=1.0" />
		<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@1,700&display=swap" type="text/css" rel="stylesheet" />
		<link href="css/index.css" type="text/css" rel="stylesheet" />

	</head>

	<body>

		<header>
			<div class="center">
				<div class="logo">
					<h2>Facebook</h2>
				</div><!--logo-->
				<form method="post" class="form-login">
					<div class="form-element">
						<p>E-mail ou telefone:</p>
						<input type="email" />

					</div><!--form-element-->
					<div class="form-element">
						<p>Senha:</p>
						<input type="password" />
					</div><!--form-element-->
					<div class="form-element">
						<input type="submit" name="acao" value="Entrar" />
					</div><!--form-element-->					
				</form><!--form-login-->
				<div class="clear"></div>
			</div><!--center-->
		</header>

		<section class="main">
			<div class="center">
				<div class="img-pessoas">
					<h2>O Facebook ajuda você a se conectar e</h2>
					<h2>compartilhar com as pessoas que fazem parte</h2>
					<h2>da sua vida.</h2>
					<img src="images/img_01.png" />
				</div><!--img-pessoas-->

				<div class="abrir-conta">
					<h2>Abra uma conta</h2>
					<h3>É rápido e fácil.</h3>
					<form class="criar-conta">
						<div class="w-50">
							<input type="text" placeholder="Nome" />
						</div><!--w-50-->

						<div class="w-50">
							<input type="text" placeholder="Sobrenome" />
						</div><!--w-50-->

						<div class="w-100">
							<input type="email" placeholder="Celular ou email" />
						</div><!--w-100-->

						<div class="w-100">
							<input type="password" placeholder="Nova senha" />
						</div><!--w-100-->

						<div class="w-100">
							<h2>Data de nascimento</h2>
							<select name="nascimento-dia"class="nascimento">
								<?php
									for($i = 1; $i <= 31; $i++){
								?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
							</select>

							<select name="nascimento-mes" class="nascimento">
								<option value="1">Jan</option>
								<option value="2">Fev</option>
								<option value="3">Mar</option>
								<option value="4">Abr</option>
								<option value="5">Mai</option>
								<option value="6">Jun</option>
								<option value="7">Jul</option>
								<option value="8">Ago</option>
								<option value="9">Set</option>
								<option value="10">Out</option>
								<option value="11">Nov</option>
								<option value="12">Dez</option>
							</select>

							<select name="nascimento-ano" class="nascimento">
								<?php
									for($i = 1960; $i <= 2020; $i++){
								?>
								<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
								<?php } ?>
							</select>
							<div class="clear"></div>

						</div><!--w-100-->

						<div class="w-100">
							<div class="input-radio">
								<input type="radio" name="sexo" value="masculino">
								<h2>Masculino</h2>
							</div><!--radio-->
							<div class="input-radio">
								<input type="radio" name="sexo" value="femenino">
								<h2>Femenino</h2>
							</div><!--radio-->
							<div class="clear"></div>
						</div><!--w-100-->

						<div class="w-100">
							<input type="submit" name="acao" value="Cadastre-se" />
						</div><!--w-100-->

						<div class="clear"></div>
					</form><!--criar-conta-->
				</div><!--abrir-conta-->

				<div class="clear"></div>
			</div><!--center-->
		</section><!--main-->

		<section class="linguas">

			<div class="center">

				<a class="selected-lingua" href="#">Português (BR)</a>
				<a class="" href="#">English (US)</a>
				<a class="" href="#">Espanõl</a>
				<a class="" href="#">Français (France)</a>
				<a class="" href="#">Italiano</a>
				<a class="" href="#">لعربية</a>
				<a class="" href="#">Deutsch</a>
				<a class="" href="#">हिन्दी</a>
				<a class="" href="#">中文(简体)</a>
				<a class="" href="#">日本語</a>

			</div><!--center-->

			<div style="border:0;padding-top:20px;"class="center">

				<a href="#">Cadastre-se</a>
				<a href="#">Entrar</a>
				<a href="#">Messenger</a>
				<a href="#">Facebook Lite</a>
				<a href="#">Watch</a>
				<a href="#">Pessoas</a>
				<a href="#">Páginas</a>
				<a href="#">Categorias de Página</a>
				<a href="#">Locais</a>
				<a href="#">Jogos</a>
				<a href="#">Locais</a>
				<a href="#">Marketplace</a>
				<a href="#">Facebook Pay</a>
				<a href="#">Grupos</a>
				<a href="#">Oculus</a>
				<a href="#">Portal</a>
				<a href="#">Instagram</a>
				<a href="#">Local</a>
				<a href="#">Campanhas de arrecadação de fundos</a>
				<a href="#">Serviços</a>
				<a href="#">Sobre</a>
				<a href="#">Criar anúncio</a>
				<a href="#">Criar Página</a>
				<a href="#">Desenvolvedores</a>
				<a href="#">Carreiras</a>
				<a href="#">Privacidade</a>
				<a href="#">Cookies</a>
				<a href="#">Opções de anúncio</a>
				<a href="#">Termos</a>
				<a href="#">Ajuda</a>

			</div><!--center-->

		</section><!--linguas-->

	</body>

</html>
