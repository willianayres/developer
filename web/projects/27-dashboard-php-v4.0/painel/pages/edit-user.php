<div class="box">

	<h2><i class="fas fa-user-edit"></i> Editar Usuário</h2>
	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['action'])){
				$name     = $_POST['name'];
				$password = $_POST['password'];
				$cur_img  = $_POST['cur_img'];
				$img      = $_FILES['img'];
				$user     = new User();
				if($img['name'] != ''){
					if(File::validImg($img)){
						File::deleteFile($cur_img, 'users/');
						$img = File::uploadFile($img, 'users/');
						if($user->userUpdate($name, $password, $img)){
							$_SESSION['img'] = $img;
							Painel::alert('success','Atualizado com sucesso junto de imagem!');
						}else
							Painel::alert('error','Erro ao enviar a imagem!');
					}else
						Painel::alert('error','Formato de imagem inválido!');
				}else{
					$img = $cur_img;
					if($user->userUpdate($name, $password, $img))
						Painel::alert('success','Atualizado com sucesso!');
					else
						Painel::alert('error','Ocorreu um erro ao atualizar!');
				}
			}
		?>
		<div class="group">
			<label>Nome:</label>
			<input type="text" name="name" required value="<?php echo $_SESSION['name']; ?>" />
		</div><!--group-->

		<div class="group">
			<label>Senha:</label>
			<input type="password" name="password" required value="<?php echo $_SESSION['password']; ?>" />
		</div><!--group-->

		<div class="group">
			<label>Imagem:</label>
			<input type="file" name="img" />
			<input type="hidden" name="cur_img" value="<?php echo $_SESSION['img']; ?>" />
		</div><!--group-->

		<div class="group">
			<input type="submit" name="action" value="Atualizar!" />
		</div><!--group-->

	</form>

</div><!--box-->