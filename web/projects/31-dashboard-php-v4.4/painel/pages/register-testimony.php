<div class="box">

	<h2><i class="fas fa-edit"></i></i> Adicionar Depoimentos</h2>
	<form method="post">
		<?php
			if(isset($_POST['action'])){
				if(Painel::insertData($_POST))
					Painel::alert('success','O cadastro do depoimento foi realizado com sucesso!');
				else
					Painel::alert('error','Campos vazios não são permitidos!');
			}
		?>
		<div class="group">
			<label>Nome da pessoa:</label>
			<input type="text" name="name" />
		</div><!--group-->

		<div class="group">
			<label>Depoimento:</label>
			<textarea class="tinymce" name="testimony"></textarea>
		</div><!--group-->

		<div class="group">
			<label>Data:</label>
			<input format="date" type="text" name="date" />
		</div><!--group-->

		<div class="group">
			<input type="hidden" name="order_id" value="0" />
			<input type="hidden" name="table" value="tb_site.testimonies" />
			<input type="submit" name="action" value="Adicionar!" />
		</div><!--group-->
	</form>

</div><!--box-->