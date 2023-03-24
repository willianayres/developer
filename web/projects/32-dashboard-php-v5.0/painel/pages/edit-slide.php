<?php
	// Check if is a set a valid id.
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		// Get the infromation of that id in the Database.
		$slide = Painel::getData('tb_site.slides','*',' WHERE id = ?',array($id),false);
		if($slide->rowCount() == 0){
			Painel::alert('error', 'O Slide que você quer editar não existe!');
			die();
		}
		$slide = $slide->fetch();
	}else{
		Painel::alert('error', 'Você precisa passar o parâmetro ID!');
		die();
	}
?>
<div class="box">
	<h2><i class="far fa-file-image"></i> Editar Slide</h2>
	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['update'])){
				$name = $_POST['name'];
				$img = $_FILES['img'];
				$cur_img = $_POST['cur_img'];
				// Check if an image was selected.
				if($img['name'] != ''){
					// Check if the image is in a valid format.
					if(File::validImg($img)){
						// It Will delete the old image file.
						File::deleteFile($cur_img,'/slides/');
						// It Will upload the img.
						$img = File::uploadFile($img,'/slides/');
						$arr = ['name' => $name,'slide' => $img,'id' => $id,'table' => 'tb_site.slides'];
						Painel::updateData($arr);
						$slide = Painel::getData('tb_site.slides','*',' WHERE id = ?',array($id));
						Painel::alert('success','O slide foi editado junto da imagem com sucesso!');
					}else
						Painel::alert('error','Formato de imagem inválido!');
				}else{
					$img = $cur_img;
					$arr = ['name' => $name,'slide' => $img,'id' => $id,'table' => 'tb_site.slides'];
					Painel::updateData($arr);
					$slide = Painel::getData('tb_site.slides','*',' WHERE id = ?',array($id));
					Painel::alert('success','O slide foi editado com sucesso!');
				}
			}
		?>
		<div class="group">
			<label>Nome:</label>
			<input type="text" name="name" required value="<?php echo $slide['name'];?>" />
		</div><!--group-->
		<div class="group">
			<label>Imagem:</label>
			<input type="file" name="img" />
			<input type="hidden" name="cur_img" value="<?php echo $slide['slide'];?>" />
		</div><!--group-->
		<div class="group">
			<input type="submit" name="update" value="Atualizar" />
		</div><!--group-->
	</form>
</div><!--box-->