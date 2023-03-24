<?php
	if(isset($_GET['id'])){
		$id     = (int)$_GET['id'];
		$notice = Painel::getData('tb_site.notices', '*', 'WHERE id = ?', array($id));
	}else{
		Painel::alert('error', 'Você precisa passar o parâmetro ID!');
		die();
	}
?>
<div class="box">

	<h2><i class="far fa-newspaper"></i> Editar Notícia</h2>
	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['action'])){
				$img     = $_FILES['cape'];
				$cur_img = $_POST['cur_img'];
				$check = Painel::getData('tb_site.notices','id', 'WHERE title = ? AND category_id = ? AND id != ?',  array($_POST['title'], $_POST['category_id'], $id), false);
				if($check->rowCount() == 0){
					// Check if an image was selected.
					if($img['name'] != ''){
						// Check if the image is in a valid format.
						if(File::validImg($img)){
							// It Will delete the old image file.
							File::deleteFile($cur_img, 'notice/');
							// It Will upload the img.
							$img  = File::uploadFile($img, 'notice/');
							$slug = Painel::generateSlug($_POST['title']);
							$arr  = ['table' => 'tb_site.notices', 'category_id' => $_POST['category_id'], 'date' => date('Y-m-d'), 'title' => $_POST['title'], 'content' => $_POST['content'], 'cape' => $img, 'slug' => $slug,'id' => $id];
							Painel::updateData($arr);
							$notice = Painel::getData('tb_site.notices', '*', 'WHERE id = ?', array('id'));
							Painel::alert('success','A notícia foi editada junto da imagem de capa com sucesso!');
						}
						else
							Painel::alert('error','Formato de imagem de capa inválido!');
					} else {
						$img = $cur_img;
						$slug = Painel::generateSlug($_POST['title']);
						$arr = ['table' => 'tb_site.notices', 'category_id' => $_POST['category_id'], 'title' => $_POST['title'], 'content' => $_POST['content'], 'cape' => $img, 'slug' => $slug,'id' => $id];
						Painel::updateData($arr);
						$notice = Painel::getData('tb_site.notices', '*', 'WHERE id = ?', array('id'));
						Painel::alert('success','A notícia foi editada com sucesso!');
					}
				}else
					Painel::alert('error', 'Já existe uma notícia com esse nome!');
			}
		?>
		<div class="group">
			<label>Título:</label>
			<input type="text" name="title" required value="<?php echo $notice['title']; ?>" />
		</div><!--group-->

		<div class="group">
			<label>Conteúdo:</label>
			<textarea class="tinymce" name="content"><?php echo $notice['content']; ?></textarea>
		</div><!--group-->

		<div class="group">
			<label>Categoria:</label>
			<select name="category_id">
				<?php 
					$categories = Painel::getData('tb_site.categories', '*', '', array(), true, true);
					foreach ($categories as $key => $value) {
				?>
					<option <?php if($value['id'] == $notice['category_id']) echo 'selected'; ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
				<?php } ?>
			</select>
		</div><!--group-->

		<div class="group">
			<label>Imagem de Capa:</label>
			<input type="file" name="cape" />
			<input type="hidden" name="cur_img" value="<?php echo $notice['cape']; ?>" />
		</div><!--group-->

		<div class="group">
			<input type="submit" name="action" value="Atualizar!" />
		</div><!--group-->

	</form>

</div><!--box-->