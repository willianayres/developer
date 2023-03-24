<?php Painel::checkPermissionPag(2);?>
<div class="box">
	<h2><i class="fas fa-user-plus"></i> Cadastrar Cliente</h2>
	<form action="<?php pathPainel();?>ajax/forms.php" class="ajax" method="post" enctype="multipart/form-data">
		<div class="group">
			<label>Nome:</label>
			<input type="text" name="name" />
		</div><!--group-->
		<div class="group">
			<label>E-mail:</label>
			<input type="text" name="email" />
		</div><!--group-->
		<div class="group">
			<label>Tipo:</label>
			<select name="client_type">
				<option value="physical">Físico</option>
				<option value="legal">Jurídico</option>
			</select>
		</div><!--group-->
		<div class="group" ref="cpf">
			<label>CPF:</label>
			<input type="text" name="cpf" />
		</div><!--group-->
		<div class="group" ref="cnpj" style="display:none;">
			<label>CNPJ:</label>
			<input type="text" name="cnpj" />
		</div><!--group-->
		<div class="group">
			<label>Imagem:</label>
			<input type="file" name="img" />
		</div><!--group-->
		<div class="group">
			<input type="hidden" name="action_type" value="register" />
			<input type="submit" name="action" value="Adicionar!" />
		</div><!--group-->
	</form>
</div><!--box-->