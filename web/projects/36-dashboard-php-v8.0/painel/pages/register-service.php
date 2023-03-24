<div class="box">
	<h2><i class="fas fa-edit"></i> Adicionar Serviço</h2>
	<form method="post">
		<?php
			if(isset($_POST['register'])){
				if(\Painel::insertData($_POST))
					\Painel::alert('success','O cadastro do serviço foi realizado com sucesso!');
				else
					\Painel::alert('error','Campos vazios não são permitidos!');
			}
		?>
		<div class="group">
			<label>Serviço:</label>
			<textarea class="tinymce" name="service"></textarea>
		</div><!--group-->
		<div class="group">
			<input type="hidden" name="order_id" value="0" />
			<input type="hidden" name="table" value="tb_site.services" />
			<input type="submit" name="register" value="Adicionar" />
		</div><!--group-->
	</form>
</div><!--box-->