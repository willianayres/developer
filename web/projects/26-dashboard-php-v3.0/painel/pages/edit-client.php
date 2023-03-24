<?php
	if(isset($_GET['id'])){
		$id    = (int)$_GET['id'];
		$client = Painel::getData('tb_admin.clients','*','WHERE id = ?',array($id));
	}else{
		Painel::alert('error', 'Você precisa passar o parâmetro ID!');
		die();
	}
?>
<div class="box">

	<h2><i class="far fa-file-image"></i> Editar Cliente</h2>
	<form action="<?php pathPainel();?>ajax/forms.php" class="ajax" method="post" enctype="multipart/form-data">
		
		<div class="group">
			<label>Nome:</label>
			<input type="text" name="name" value="<?php echo $client['name'];?>" />
		</div><!--group-->

		<div class="group">
			<label>E-mail:</label>
			<input type="text" name="email" value="<?php echo $client['email'];?>" />
		</div><!--group-->

		<div class="group">
			<label>Tipo:</label>
			<select name="client_type">
				<option <?php if($client['client_type'] == 'physical') echo 'selected';?> value="physical">Físico</option>
				<option <?php if($client['client_type'] == 'legal') echo 'selected';?> value="legal">Jurídico</option>
			</select>
		</div><!--group-->

		<div class="group" ref="cpf">
			<label>CPF:</label>
			<input type="text" name="cpf" value="<?php echo ($client['client_type'] == 'physical') ? $client['number'] : '';?>" />
		</div><!--group-->

		<div class="group" ref="cnpj" style="display:none;">
			<label>CNPJ:</label>
			<input type="text" name="cnpj" value="<?php echo ($client['client_type'] == 'legal') ? $client['number'] : '';?>" />
		</div><!--group-->

		<div class="group">
			<label>Imagem:</label>
			<input type="file" name="img" />
			<input type="hidden" name="cur_img" value="<?php echo $client['img'];?>" />
		</div><!--group-->

		<div class="group">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="hidden" name="action_type" value="update" />
			<input type="submit" name="action" value="Atualizar!" />
		</div><!--group-->

	</form>
	
</div><!--box-->