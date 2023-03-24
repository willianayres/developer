<div class="box">

	<h2><i class="fas fa-edit"></i> Adicionar Slide</h2>
	<form method="post" enctype="multipart/form-data">	
		<?php
			if(isset($_POST['register'])){
				$name = $_POST['name'];
				$img = $_FILES['img'];
				if($name == '')
					Painel::alert('error','O campo "nome da slide" está vazio!');
				else if($img['name'] == '')
					Painel::alert('error','A "imagem" precisa estar selecionada!');
				else{
					if(!File::validImg($img))
						Painel::alert('error','Insira uma imagem em formato válido!');
					else{
						$img = File::uploadFile($img,'/slides/');
						$arr = ['name' => $name, 'slide'=>$img,'order_id'=>0,'table'=>'tb_site.slides'];
						Painel::insertData($arr);
						Painel::alert('success','O cadastro do slide realizado com sucesso!');
					}
				}
			}
		?>
		<div class="group">
			<label>Nome do slide:</label>
			<input type="text" name="name" />
		</div><!--group-->
		<div class="group">
			<label>Imagem:</label>
			<input type="file" name="img" />
		</div><!--group-->
		<div class="group">
			<input type="submit" name="register" value="Adicionar" />
		</div><!--group-->
	</form>
</div><!--box-->