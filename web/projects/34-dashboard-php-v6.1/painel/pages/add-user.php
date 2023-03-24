<?php \Painel::checkPermissionPag(2);?>
<div class="box">
	<h2><i class="fas fa-user-plus"></i> Adicionar Usuário</h2>
	<form method="post" enctype="multipart/form-data">
		<?php
			// If Post was called.
			if(isset($_POST['add'])){
				// Get the Post variables.
				$login = $_POST['login'];
				$name = $_POST['name'];
				$password = $_POST['password'];
				$office = $_POST['office'];
				$img = $_FILES['img'];
				// Check for no empty values.
				if($login == '')
					\Painel::alert('error','O "login" está vazio!');
				else if($name == '')
					\Painel::alert('error','O "nome" está vazio!');
				else if($password == '')
					\Painel::alert('error','A "senha" está vazia!');
				else if($office == '')
					\Painel::alert('error','O "cargo" precisa estar selecionado!');
				else if($img['name'] == '')
					\Painel::alert('error','A "imagem" precisa estar selecionada!');
				else{
					// Does not allow to register the same level of entity.
					if($office >= $_SESSION['office'])
						\Painel::alert('error','Você precisa selecionar um cargo menor que o seu!');
					// Check for valid image.
					else if(!File::validImg($img))
						\Painel::alert('error','Insira uma imagem em formato válido!');
					// Check if the user already exists.
					else if(User::userExists($login))
						\Painel::alert('error','O login já existe, selecione outro por favor.');
					else{
						// Try to upload the image.
						$img = \File::uploadFile($img, 'users/');
						if(!$img){
							\Painel::alert('error','Falha no upload da imagem!');
						}else{
							// Create the new user and insert it at the Database.
							$user = new User();
							$user->userRegister($login,$password,$img,$name,$office);
							\Painel::alert('success','O cadastro do usuário '.$login.' realizado feito com sucesso!');
						}
					}
				}
			}
		?>
		<div class="group">
			<label>Login:</label>
			<input type="text" name="login" />
		</div><!--group-->
		<div class="group">
			<label>Nome:</label>
			<input type="text" name="name" />
		</div><!--group-->
		<div class="group">
			<label>Senha:</label>
			<input type="password" name="password" />
		</div><!--group-->
		<div class="group">
			<label>Cargo:</label>
			<select name="office">
				<?php
					// Display all the current login types avaible.
					foreach (\Painel::$offices as $key => $value){
						if($key < $_SESSION['office']) echo '<option value="'.$key.'">'.$value.'</option>';
					}
				?>
			</select>
		</div><!--group-->
		<div class="group">
			<label>Imagem:</label>
			<input type="file" name="img" />
		</div><!--group-->
		<div class="group">
			<input type="submit" name="add" value="Adicionar" />
		</div><!--group-->
	</form>
</div><!--box-->