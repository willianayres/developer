<div class="box">
	<h2><i class="fas fa-box"></i> Cadastrar Produtos</h2>
	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['register'])){
				// Variables.
				// Check to break the logic if something wrong happens in general.
				$check = true;
				// Check to break the logic if something wrong happens in uploads.
				$upload = true;
				// Get the input fields from the form.
				$name = $_POST['name'];
				$description = $_POST['description'];
				$width = $_POST['width'];
				$height = $_POST['height'];
				$length = $_POST['length'];
				$weight = $_POST['weight'];
				$amount = $_POST['amount'];
				// Get the input images from the form.
				$imgs_amount = count($_FILES['imgs']['name']);
				// Helper array.
				$imgs = array();
				// Check for no blank fields.
				if($name == '' || $description == '' || $width == '' || $height == '' || $length == '' || $weight == ''){
					$check = false;
					Painel::alert('error','Campos vazios não são permitidos!');
				}
				// Check if images were selected.
				if($_FILES['imgs']['name'][0] != '' && $check){
					// Save the upload image names.
					$img_names = array();
					// Iterate the input files from the form.
					for($i=0; $i<$imgs_amount; $i++){
						// Get the info to use in the upload function.
						$cur_img = array('name'=>$_FILES['imgs']['name'][$i],'tmp_name'=>$_FILES['imgs']['tmp_name'][$i],'type'=>$_FILES['imgs']['type'][$i],'size'=>$_FILES['imgs']['size'][$i]);
						// Check for valid images.
						if(!File::validImg($cur_img)){
							Painel::alert('error','A '.(($i)+1).'ª imagem selecionada é inválida!');
							$check = false;
							break;
						}else{
							array_push($img_names,File::uploadFile($cur_img,'/storage/'));
							// Check if the upload was ok.
							if(!$img_names[$i]){
								Painel::alert('error','Ocorreu um erro ao fazer upload da '.(($i)+1).'ª imagem!');
								$check = false;
								$upload = false;
								break;
							}
						}
					}
				// Just allows the register of the product with, at least, one image.
				}else{
					$check = false;
					Painel::alert('error','Você precisa selecionar pelo menos uma imagem válida!');
				}
				// If everthing went correctly until here.
				if($check){
					// Prepare the array to insert into the database.
					$product = array('table'=>'tb_admin.storage','name'=>$name,'description'=>$description,'width'=>$width,'height'=>$height,'length'=>$length,'weight'=>$weight,'amount'=>$amount);
					// Check if the insertion was ok.
					if(Painel::insertData($product,false)){
						// Get the product id that was inserted.						
						$product = Painel::getData('tb_admin.storage','*','','',true,true);
						$product_id = $product[count($product)-1]['id'];
						// Iterate to insert all the images into the database.
						for($i=0; $i<count($img_names); $i++){
							// Check if the insertion was ok.
							if(!Painel::insertData(array('table'=>'tb_admin.storage-images','product_id'=>$product_id,'img'=>$img_names[$i]),false)){
								$upload = false;
								break;
							}
						}
						// If something went wrong in the upload or insertion in database.
						if(!$upload){
							// Clean the database.
							Painel::deleteData('tb_admin.storage-images',' WHERE product_id = ?',array($product_id));
							Painel::deleteData('tb_admin.storage',' WHERE id = ?',array($product_id));
							Painel::alert('error','Ocorreu um erro ao cadastrar o produto no banco de dados!');
						}
						// If something went wrong in the insertion in database.
					}else{
						Painel::alert('error','Ocorreu um erro ao cadastrar o produto no banco de dados!');
					}
				// Clean images uploaded to the website paste.
				}else if(!$check && (isset($img_names) && count($img_names) > 0 && !$upload)){
					for($i=0; $i<count($img_names); $i++){
						File::deleteFile($img_names[$i],'/storage/');
					}
				}
				// Everthing is ok.
				if($check && $upload){
					Painel::alert('success','O cadastro do produto foi realizado com sucesso!');
				}
			}
		?>
		<div class="group">
			<label>Nome do produto:</label>
			<input type="text" name="name" required />
		</div><!--group-->
		<div class="group">
			<label>Descrição do produto:</label>
			<textarea name="description" required></textarea>
		</div><!--group-->
		<div class="group">
			<label>Largura do produto (cm):</label>
			<input type="number" name="width" min="0" max="900" step="5" value="0" required />
		</div><!--group-->
		<div class="group">
			<label>Altura do produto (cm):</label>
			<input type="number" name="height" min="0" max="900" step="5" value="0" required />
		</div><!--group-->
		<div class="group">
			<label>Comprimento do produto (cm):</label>
			<input type="number" name="length" min="0" max="900" step="5" value="0" required />
		</div><!--group-->
		<div class="group">
			<label>Peso do produto (Kg):</label>
			<input type="number" name="weight" min="0" max="900" step="5" value="0" required />
		</div><!--group-->
		<div class="group">
			<label>Quantidade atual do produto:</label>
			<input type="number" name="amount" min="0" max="999" step="1" value="0" />
		</div><!--group-->
		<div class="group">
			<label>Selecione as images:</label>
			<input type="file" name="imgs[]" multiple />
		</div><!--group-->
		<div class="group">
			<input type="submit" name="register" value="Cadastrar Produto" />
		</div><!--group-->
	</form>
</div><!--box-->