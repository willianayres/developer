<div class="box">
	<h2><i class="fas fa-th-large"></i> Cadastrar Categoria</h2>
	<form method="post">	
		<?php
			if(isset($_POST['register'])){
				$name = $_POST['name'];
				if($name == '')
					Painel::alert('error','O campo "nome da categoria" está vazio!');
				else{
					$check = Painel::getData('tb_site.categories','*',' WHERE name = ?',array($_POST['name']),false);
					if($check->rowCount() == 0){
						$slug = Painel::generateSlug($name);
						$arr = ['name' => $name,'slug' => $slug,'order_id' => 0,'table' => 'tb_site.categories'];
						Painel::insertData($arr);
						Painel::alert('success','O cadastro da categoria foi realizado com sucesso!');
					}else
						Painel::alert('error','Já existe uma categoria com este nome!');
				}
			}
		?>
		<div class="group">
			<label>Nome da Categoria:</label>
			<input type="text" name="name" />
		</div><!--group-->

		<div class="group">
			<input type="submit" name="register" value="Adicionar" />
		</div><!--group-->
	</form>
</div><!--box-->