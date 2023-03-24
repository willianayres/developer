<?php
	// Check if is a set a valid id.
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		// Get the infromation of that id in the Database.
		$category = \Painel::getData('tb_site.categories','*',' WHERE id = ?',array($id),0);
		if($category->rowCount() == 0){
			\Painel::alert('error', 'A categoria que você quer editar não existe!');
			die();
		}
		$category = $category->fetch();
	}else{
		\Painel::alert('error','Você precisa passar o parâmetro "ID".');
		die();
	}
?>
<div class="box">
	<h2><i class="fas fa-th-large"></i> Editar Categoria</h2>
	<form method="post">
		<?php
			// Check if Post was set.
			if(isset($_POST['update'])){
				// Generate a slug for that category.
				$slug = \Painel::generateSlug($_POST['name']);
				// Merge all the information.
				$arr = array_merge($_POST, array('slug' => $slug));
				// Check if the updated category already exists.
				$check_category = \Painel::getData('tb_site.categories','*',' WHERE name = ? AND id != ?',array($_POST['name'],$id),0);
				if($check_category->rowCount() == 1)
					\Painel::alert('error','Já existe uma categoria com este nome!');
				else{
					// Try to update the category.
					if(\Painel::updateData($arr)){
						\Painel::alert('success','A categoria foi editada com sucesso!');
						$category = \Painel::getData('tb_site.categories','*',' WHERE id = ?',array($id));
					}
					else
						\Painel::alert('error','Campos vazios não são permitidos!');
				}
			}
		?>
		<div class="group">
			<label>Categoria:</label>
			<input type="text" name="name" value="<?php echo $category['name'];?>" />
		</div><!--group-->
		<div class="group">
			<input type="hidden" name="id" value="<?php echo $category['id'];?>" />
			<input type="hidden" name="table" value="tb_site.categories" />
			<input type="submit" name="update" value="Atualizar!" />
		</div><!--group-->
	</form>
</div><!--box-->