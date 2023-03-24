<div class="box">
	<h2><i class="fas fa-building"></i> Cadastrar Empreendimento</h2>
	<form method="post" enctype="multipart/form-data">
		<?php 
			if(isset($_POST['action'])){
				$name = $_POST['name'];
				$type = $_POST['type'];
				$img = $_FILES['img'];
				$price = ($_POST['price'] == '') ? '0.00' : \Painel::moneySubmit($_POST['price']);

				if($name == '' || $type == '' || $price == ''){
					\Painel::alert('error', 'Campos vazios não são permitidos!');
				}
				else if($img['tmp_name'] == '' || $img['name'] == ''){
					\Painel::alert('error', 'Uma imagem precisa ser selecionada!');
				}
				else{
					if(\File::validImg($img)){
						$img = \File::uploadFile($img,'/enterprises/');
						if($img){
							$arr = array('table' => 'tb_admin.enterprises','name' => $name,'type' => $type,'price' => $price,'img' => $img,'order_id' => 0);
							if(\Painel::insertData($arr,1)){
								\Painel::alert('success','O cadastro do empreendimento foi realizado com sucesso!');
								//Painel::redirectPage(INCLUDE_PATH_PAINEL.'register-notice?success');
							}else{
								\File::deleteFile($img,'/enterprises/');
							}
						}else{
							\Painel::alert('error','Erro no upload da imagem!');
						}
					}else
						\Painel::alert('error','A imagem inserida é inválida!');
				}
			}
		?>
		<div class="group">
			<label>Nome do Empreendimento:</label>
			<input type="text" name="name" required />
		</div><!--group-->
		<div class="group">
			<label>Tipo do Empreendimento:</label>
			<select name="type" required>
				<option value="residential">Residencial</option>
				<option value="commercial">Comercial</option>
			</select>
		</div><!--group-->
		<div class="group">
			<label>Preço:</label>
			<input type="text" name="price" required />
		</div><!--group-->
		<div class="group">
			<label>Imagem:</label>
			<input type="file" name="img" required />
		</div><!--group-->
		<div class="group">
			<input type="submit" name="action" value="Cadastrar" />
		</div><!--group-->
	</form>
</div><!--box-->