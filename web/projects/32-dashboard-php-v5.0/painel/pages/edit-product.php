<?php
// Check if is a set a valid id.
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		// Get the infromation of that id in the Database.
		$product = Painel::getData('tb_admin.storage','*',' WHERE id = ?',array($id),false);
		if($product->rowCount() == 0){
			Painel::alert('error','O produto que você quer editar não existe!');
			die();
		}
	}else{
		Painel::alert('error','Você precisa passar o parâmetro ID!');
		die();
	}
	$product = $product->fetch();
	// Get the current page id.
	$cur_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$per_page = PER_PAGE;
?>
<div class="box">
	<h2><i class="fas fa-box"></i> Editar Produto <?php echo $id?></h2>
	<?php
		// Check if an update was done.
		if(isset($_GET['update'])){
			Painel::alert('success','A atualização do produto foi realizada com sucesso!');
		}
	?>
	<div class="boxes-title"><i class="fas fa-file-image"></i> Imagens do Produto:</div><!--box-title-->
	<?php
		// Check if image delete was requested.
		if(isset($_GET['deleteimage'])){
			// Get the id of the image.
			$id_img = (int)$_GET['deleteimage'];
			// Check if the image was insert in Database.
			$img = Painel::getData('tb_admin.storage-images','*',' WHERE id = ?',array($id_img),true);		
			if($img != array( ) && count($img) > 0){
				// Remove from Database and delete the image.
				File::deleteFile($img['img'],'/storage/');
				Painel::deleteData('tb_admin.storage-images',' WHERE id = ?', array($id_img));
				Painel::alert('success','A imagem foi deletada com sucesso!');
			}
		}
		// Update the page information.
		$product_imgs = Painel::getData('tb_admin.storage-images','*',' WHERE product_id = ?',array($id),true,true);
	?>
	<div class="boxes-flex">
		<?php foreach ($product_imgs as $key => $value){ ?>
		<div class="boxes-wraper">
			<div class="boxes-wraper-inside">
				<div class="boxes-imgs">
					<img class="img-square" alt="teste" src="<?php images();?>/storage/<?php echo $value['img'];?>" />
				</div><!--boxes-imgs-->
				<div class="box-single">
					<div class="body">
						<div class="buttons">
							<a box="confirm" class="delete" href="<?php pathPainel();?>edit-product?id=<?php echo $id;?>&deleteimage=<?php echo $value['id'];?>"><i class="far fa-trash-alt"></i></i> Excluir</a>
						</div><!--buttons-->
					</div><!--body-->
				</div><!--box-single-->
			</div><!--boxes-wraper-inside-->
		</div><!--boxes-wraper-->
		<?php } ?>
	</div><!--boxes-flex-->

	<div class="boxes-title"><i class="fas fa-info"></i> Informações do Produto:</div><!--box-title-->
	<form action="<?php echo pathPainel();?>edit-product?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['action'])){
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
							$upload = false;
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
				}
				// If everthing went correctly until here.
				if($check){
					// Prepare the array to insert into the database.
					$product = array('table'=>'tb_admin.storage','id'=>$id,'name'=>$name,'description'=>$description,'width'=>$width,'height'=>$height,'length'=>$length,'weight'=>$weight,'amount'=>$amount);
					// Check if the insertion was ok.
					if(Painel::updateData($product,false)){						
						// Iterate to insert all the images into the database.
						if($_FILES['imgs']['name'][0] != ''){
							for($i=0; $i<count($img_names); $i++){
								// Check if the insertion was ok.
								if(!Painel::insertData(array('table'=>'tb_admin.storage-images','product_id'=>$id,'img'=>$img_names[$i]),false)){
									$upload = false;
									break;
								}
							}
							// If something went wrong in the upload or insertion in database.
							if(!$upload){
								// Clean the database.
								for($i=0; $i<count($img_names); $i++){
									Painel::deleteData('tb_admin.storage-images',' WHERE img = ?',array($img_names[$i]));
								}
								Painel::alert('error','Ocorreu um erro ao atualizar o produto no banco de dados!');
							}
						}
						echo '<script>console.log("Tudo okay por aqui!");</script>';
						// If something went wrong in the insertion in database.
					}else{
						Painel::alert('error','Ocorreu um erro ao atualizar o produto no banco de dados!');
					}
				// Clean images uploaded to the website paste.
				}else if(!$check && (isset($img_names) && count($img_names) > 0 && !$upload)){
					for($i=0; $i<count($img_names); $i++){
						File::deleteFile($img_names[$i],'/storage/');
					}
				}
				// Everthing is ok.
				if($check && $upload){
					Painel::redirectPage(INCLUDE_PATH_PAINEL.'edit-product?id='.$id.'&update');
				}
			}
		?>
		<div class="group">
			<label>Nome do produto:</label>
			<input type="text" name="name" required value="<?php echo $product['name'];?>" />
		</div><!--group-->
		<div class="group">
			<label>Descrição do produto:</label>
			<textarea name="description" required><?php echo $product['description'];?></textarea>
		</div><!--group-->
		<div class="group">
			<label>Largura do produto (cm):</label>
			<input type="number" name="width" min="0" max="900" step="1" value="<?php echo $product['width'];?>" required />
		</div><!--group-->
		<div class="group">
			<label>Altura do produto (cm):</label>
			<input type="number" name="height" min="0" max="900" step="1" value="<?php echo $product['height'];?>" required />
		</div><!--group-->
		<div class="group">
			<label>Comprimento do produto (cm):</label>
			<input type="number" name="length" min="0" max="900" step="1" value="<?php echo $product['length'];?>" required />
		</div><!--group-->
		<div class="group">
			<label>Peso do produto (Kg):</label>
			<input type="number" name="weight" min="0" max="900" step="1" value="<?php echo $product['weight'];?>" required />
		</div><!--group-->
		<div class="group">
			<label>Quantidade atual do produto:</label>
			<input type="number" name="amount" min="0" max="999" step="1" value="<?php echo $product['amount'];?>" />
		</div><!--group-->
		<div class="group">
			<label>Selecione as images:</label>
			<input type="file" name="imgs[]" multiple />
		</div><!--group-->
		<div class="group">
			<input type="submit" name="action" value="Atualizar Produto" />
		</div><!--group-->
	</form>
</div><!--box-->