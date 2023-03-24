<?php $info = \Painel::getData('tb_site.config');?>
<div class="box">
	<h2><i class="fas fa-code"></i> Editar Configurações do Site</h2>
	<form method="post" enctype="multipart/form-data">	
		<?php
			if(isset($_POST['update'])){
				$img1 = $_FILES['author_image'];
				$img2 = $_FILES['ajax_image'];
				$cur_img1 = $_POST['cur_author_image'];
				$cur_img2 = $_POST['cur_ajax_image'];
				unset($_POST['cur_author_image']);
				unset($_POST['cur_ajax_image']);
				unset($_POST['author_image']);
				unset($_POST['ajax_image']);
				// Check if an image was selected.
				if($img1['name'] != '' && isset($img2['name'])){
					// Check if the image is in a valid format.
					if(\File::validImg($img1)){
						// It Will delete the old image file.
						\File::deleteFile($cur_img1,'/site/');
						// It Will upload the img.
						$img1 = \File::uploadFile($img1,'/site/');
						$arr = array_merge($_POST, array('author_image' => $img1));
						\Painel::updateData($arr);
						$info = Painel::getData('tb_site.config');
						\Painel::alert('success','O site foi editado junto da imagem com sucesso!');
					}
					else
						\Painel::alert('error','Formato de imagem inválido!');
				} else if($img2['name'] != '' && isset($img1['name'])){
					// Check if the image is in a valid format.
					if(\File::validImg($img2,1000,1)){
						// It Will delete the old image file.
						\File::deleteFile($cur_img2,'/ajax/');
						// It Will upload the img.
						$img2 = File::uploadFile($img2,'/ajax/');
						$arr = array_merge($_POST, array('ajax_image' => $img2));
						\Painel::updateData($arr);
						$info = Painel::getData('tb_site.config');
						\Painel::alert('success','O site foi editado junto da imagem com sucesso!');
					}
					else
						\Painel::alert('error','Formato de imagem inválido!');
				} else {
					$img1 = $cur_img1;
					$img2 = $cur_img2;
					$arr = array_merge($_POST,array('author_image' => $img1,'ajax_image' => $img2));
					\Painel::updateData($arr);
					$info = Painel::getData('tb_site.config');
					\Painel::alert('success','O site foi editado com sucesso!');
				}
			}
		?>
		<div class="group">
			<label>Título:</label>
			<input type="text" name="title" value="<?php echo $info['title']?>" />
		</div><!--group-->
		<div class="group">
			<label>Nome do Autor:</label>
			<input type="text" name="author_name" value="<?php echo $info['author_name']?>" />
		</div><!--group-->
		<div class="group">
			<label>Descrição do Autor:</label>
			<textarea class="tinymce" name="author_description"><?php echo $info['author_description'];?></textarea>
		</div><!--group-->
		<div class="group">
			<label>Imagem do Autor:</label>
			<input type="file" name="author_image" />
			<input type="hidden" name="cur_author_image" value="<?php echo $info['author_image']; ?>" />
		</div><!--group-->
		<div class="group">
			<label>Ícone 1:</label>
			<input type="text" name="icon_1" value="<?php echo $info['icon_1']?>" />
		</div><!--group-->
		<div class="group">
			<label>Título do Ícone 1:</label>
			<input type="text" name="icon_title_1" value="<?php echo $info['icon_title_1']?>" />
		</div><!--group-->
		<div class="group">
			<label>Texto do Ícone 1:</label>
			<textarea class="tinymce" name="icon_text_1"><?php echo $info['icon_text_1'];?></textarea>
		</div><!--group-->
		<div class="group">
			<label>Ícone 2:</label>
			<input type="text" name="icon_2" value="<?php echo $info['icon_2']?>" />
		</div><!--group-->
		<div class="group">
			<label>Título do Ícone 2:</label>
			<input type="text" name="icon_title_2" value="<?php echo $info['icon_title_2']?>" />
		</div><!--group-->
		<div class="group">
			<label>Texto do Ícone 2:</label>
			<textarea class="tinymce" name="icon_text_2"><?php echo  $info['icon_text_2'];?></textarea>
		</div><!--group-->
		<div class="group">
			<label>Ícone 3:</label>
			<input type="text" name="icon_3" value="<?php echo $info['icon_3']?>" />
		</div><!--group-->
		<div class="group">
			<label>Título do Ícone 3:</label>
			<input type="text" name="icon_title_3" value="<?php echo $info['icon_title_3']?>" />
		</div><!--group-->
		<div class="group">
			<label>Texto do Ícone 3:</label>
			<textarea class="tinymce" name="icon_text_3"><?php echo  $info['icon_text_3'];?></textarea>
		</div><!--group-->
		<div class="group">
			<label>Imagem AJAX:</label>
			<input type="file" name="ajax_image" />
			<input type="hidden" name="cur_ajax_image" value="<?php echo $info['ajax_image']; ?>" />
		</div><!--group-->
		<div class="group">
			<input type="hidden" name="id" value="<?php echo $info['id']; ?>" />
			<input type="hidden" name="table" value="tb_site.config" />
			<input type="submit" name="update" value="Atualizar" />
		</div><!--group-->
	</form>
</div><!--box-->