<?php
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		$service = Painel::getData('tb_site.services', '*', 'WHERE id = ?', array($id));
	}else{
		Painel::alert('error','Você precisa passar o parâmetro "ID".');
		die();
	}
?>
<div class="box">

	<h2><i class="fas fa-comment-dots"></i> Editar Serviço</h2>
	<form method="post">
		<?php
			if(isset($_POST['action'])){
				if(Painel::updateData($_POST)){
					Painel::alert('success','O serviço foi editado com sucesso!');
					$service = Painel::getData('tb_site.services', '*', 'WHERE id = ?', array($id));
				}else
					Painel::alert('error','Campos vazios não são permitidos!');
			}
		?>
		<div class="group">
			<label>Serviço:</label>
			<textarea class="tinymce" name="service"><?php echo $service['service']; ?></textarea>
		</div><!--group-->

		<div class="group">
			<input type="hidden" name="id" value="<?php echo $service['id']; ?>" />
			<input type="hidden" name="table" value="tb_site.services" />
			<input type="submit" name="action" value="Atualizar!" />
		</div><!--group-->

	</form>

</div><!--box-->