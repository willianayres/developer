<div class="box">

	<h2><i class="far fa-newspaper"></i> Cadastrar Notícia</h2>
	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['action'])){
				$cape = $_FILES['cape'];
				if($_POST['title'] == '' || $_POST['content'] == '')
					Painel::alert('error', 'Campos vazios não são permitidos!');
				else if($cape['tmp_name'] == '')
					Painel::alert('error', 'A imagem de capa precisas ser selecionada!');
				else{
					if(File::validImg($cape)){
						$check = Painel::getData('tb_site.notices', '*', 'WHERE title = ? AND category_id = ?', array($_POST['title'], $_POST['category_id']), false);
						if($check->rowCount() == 0){
							$img  = File::uploadFile($cape, 'notices/');
							$slug = Painel::generateSlug($_POST['title']);
							$arr  = array('table' => $_POST['table'], 'category_id' => $_POST['category_id'], 'date' => date('Y-m-d'), 'title' => $_POST['title'], 'content' => $_POST['content'], 'cape' => $img, 'slug' => $slug, 'order_id' => $_POST['order_id']);
							if(Painel::insertData($arr))
								//Painel::alert('success', 'Cadastro de notícia realizado com sucesso!');
								Painel::redirectPage(INCLUDE_PATH_PAINEL.'register-notice?success');
						}
						else
							Painel::alert('error', 'Já existe uma notícia com esse nome!');
					}else
						Painel::alert('error', 'Selecione uma imagem válida!');
				}
			}
			if(isset($_GET['success']) && !isset($_POST['action'])){
				Painel::alert('success', 'Cadastro de notícia realizado com sucesso!');
			}
		?>
		<div class="group">
			<label>Categoria:</label>
			<select name="category_id">
				<?php 
					$categories = Painel::getData('tb_site.categories', '*', '', array(), true, true);
					foreach ($categories as $key => $value) {
				?>
				<option <?php if($value['id'] == @$_POST['category_id']) echo "selected"; ?>value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
				<?php } ?>
			</select>
		</div><!--group-->

		<div class="group">
			<label>Título:</label>
			<input type="text" name="title" value="<?php echo Painel::recoverPost('title'); ?>" />
		</div><!--group-->

		<div class="group">
			<label>Conteúdo:</label>
			<textarea class="tinymce" name="content"><?php echo Painel::recoverPost('content'); ?></textarea>
		</div><!--group-->

		<div class="group">
			<label>Imagem de Capa:</label>
			<input type="file" name="cape" />
		</div><!--group-->

		<div class="group">
			<input type="hidden" name="order_id" value="0" />
			<input type="hidden" name="table" value="tb_site.notices" />
			<input type="submit" name="action" value="Adicionar!" />
		</div><!--group-->

	</form>

</div><!--box-->