<?php
	if(isset($_GET['id'])){
		$id       = (int)$_GET['id'];
		$category = Painel::getData('tb_site.categories', '*', 'WHERE id = ?', array($id));
	}else{
		Painel::alert('error','Você precisa passar o parâmetro "ID".');
		die();
	}
?>
<div class="box">

	<h2><i class="fas fa-th-large"></i> Editar Categoria</h2>
	<form method="post">
		<?php
			if(isset($_POST['action'])){
				$slug = Painel::generateSlug($_POST['name']);
				$arr  = array_merge($_POST, array('slug' => $slug));
				$check_category = Painel::getData('tb_site.categories', '*', 'WHERE name = ? AND id != ?', array($_POST['name'], $id), false);
				if($check_category->rowCount() == 1)
					Painel::alert('error', 'Já existe uma categoria com este nome!');
				else {
					if(Painel::updateData($arr)){
						Painel::alert('success','A categoria foi editada com sucesso!');
						$category = Painel::getData('tb_site.categories', '*', 'WHERE id = ?', array($id));
					}
					else
						Painel::alert('error','Campos vazios não são permitidos!');
				}
			}
		?>
		<div class="group">
			<label>Categoria:</label>
			<input type="text" name="name" value="<?php echo $category['name']; ?>" />
		</div><!--group-->

		<div class="group">
			<input type="hidden" name="id" value="<?php echo $category['id']; ?>" />
			<input type="hidden" name="table" value="tb_site.categories" />
			<input type="submit" name="action" value="Atualizar!" />
		</div><!--group-->

	</form>

</div><!--box-->