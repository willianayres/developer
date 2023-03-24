<?php
	// Check if is a set a valid id.
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		// Get the infromation of that id in the Database.
		$testimony = Painel::getData('tb_site.testimonies','*',' WHERE id = ?',array($id));
		if($testimony->rowCount() == 0){
			Painel::alert('error', 'A categoria que você quer editar não existe!');
			die();
		}
		$testimony = $testimony->fetch();
	}else{
		Painel::alert('error','Você precisa passar o parâmetro "ID".');
		die();
	}
?>
<div class="box">
	<h2><i class="fas fa-comment-dots"></i> Editar Depoimento</h2>
	<form method="post">
		<?php
			if(isset($_POST['update'])){
				if(Painel::updateData($_POST)){
					Painel::alert('success','O depoimento foi editado com sucesso!');
					$testimony = Painel::getData('tb_site.testimonies','*',' WHERE id = ?',array($id));
				}else
					Painel::alert('error','Campos vazios não são permitidos!');
			}
		?>
		<div class="group">
			<label>Nome da pessoa:</label>
			<input type="text" name="name" value="<?php echo $testimony['name'];?>" />
		</div><!--group-->
		<div class="group">
			<label>Depoimento:</label>
			<textarea class="tinymce" name="testimony"><?php echo $testimony['testimony'];?></textarea>
		</div><!--group-->
		<div class="group">
			<label>Data:</label>
			<input format="date" type="text" name="date" value="<?php echo $testimony['date'];?>" />
		</div><!--group-->
		<div class="group">
			<input type="hidden" name="id" value="<?php echo $testimony['id'];?>" />
			<input type="hidden" name="table" value="tb_site.testimonies" />
			<input type="submit" name="update" value="Atualizar!" />
		</div><!--group-->
	</form>
</div><!--box-->