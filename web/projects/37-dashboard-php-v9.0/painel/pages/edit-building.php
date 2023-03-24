<?php
// Check if is a set a valid id.
	if(isset($_GET['id'])){
		$id = (int)$_GET['id'];
		// Get the infromation of that id in the Database.
		$building = \Painel::getData('tb_admin.buildings','*',' WHERE id = ?',array($id),0);
		if($building->rowCount() == 0){
			\Painel::alert('error','O imóvel que você quer editar não existe!');
			die();
		}
	}else{
		\Painel::alert('error','Você precisa passar o parâmetro ID!');
		die();
	}
	$building = $building->fetch();
	// Get the current page id.
	$cur_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$per_page = PER_PAGE;
?>
<div class="box">
	<h2><i class="fas fa-box"></i> Editar Imóvel <?php echo $building['name'];?></h2>
	<div class="boxes-title"><i class="fas fa-file-image"></i> Imagens do Produto:</div><!--box-title-->
	<?php
		// Check if image delete was requested.
		if(isset($_GET['deleteimage'])){
			// Get the id of the image.
			$id_img = (int)$_GET['deleteimage'];
			// Check if the image was insert in Database.
			$img = \Painel::getData('tb_admin.buildings-images','*',' WHERE id = ?',array($id_img),1);		
			if($img != array( ) && count($img) > 0){
				// Remove from Database and delete the image.
				\File::deleteFile($img['img'],'/buildings/');
				\Painel::deleteData('tb_admin.buildings-images',' WHERE id = ?',array($id_img));
				\Painel::alert('success','A imagem foi deletada com sucesso!');
			}
		}else if(isset($_GET['deletebuilding'])){
			$building_imgs = \Painel::getData('tb_admin.buildings-images','*',' WHERE building_id = ?',array($id),1,1);
			foreach($building_imgs as $key => $value){
				\File::deleteFile($value['img'],'/buildings/');
			}
			\Painel::deleteData('tb_admin.buildings-images',' WHERE building_id = ?',array($id));
			\Painel::deleteData('tb_admin.buildings',' WHERE id = ?',array($id));
			\Painel::alertJS('O imóvel foi deletado com sucesso!');
			\Painel::redirectPage(INCLUDE_PATH_PAINEL.'list-enterprises');
		}
		// Update the page information.
		$building_imgs = \Painel::getData('tb_admin.buildings-images','*',' WHERE building_id = ?',array($id),1,1);
	?>
	<div class="boxes-flex">
		<?php foreach($building_imgs as $key => $value){ ?>
		<div class="boxes-wraper">
			<div class="boxes-wraper-inside">
				<div class="boxes-imgs">
					<img class="img-square" alt="teste" src="<?php images();?>/buildings/<?php echo $value['img'];?>" />
				</div><!--boxes-imgs-->
				<div class="box-single">
					<div class="body">
						<div class="buttons">
							<a box="confirm" class="delete" href="<?php pathPainel();?>edit-building?id=<?php echo $id;?>&page=<? echo $cur_page;?>&deleteimage=<?php echo $value['id'];?>"><i class="far fa-trash-alt"></i></i> Excluir</a>
						</div><!--buttons-->
					</div><!--body-->
				</div><!--box-single-->
			</div><!--boxes-wraper-inside-->
		</div><!--boxes-wraper-->
		<?php } ?>
	</div><!--boxes-flex-->

	<div class="pagination">
		<?php
			// Total pages is definid by ceiling the number of elementes on the table divided
			// by the number that you want to have showed per page.
			$tot_pages = ceil(count(\Painel::getData('tb_admin.buildings-images','*',' WHERE building_id = ?',array($id),1,1)) / $per_page);
			for($i=1; $i<=$tot_pages; $i++){
				if($i == $cur_page)
					echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'edit-building?id='.$id.'&page='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'edit-building?id='.$id.'&page='.$i.'">'.$i.'</a>';
			}
		?>
	</div><!--pagination-->

	<div class="boxes-title"><i class="fas fa-info"></i> Informações do Produto:</div><!--box-title-->
	<form method="post" enctype="multipart/form-data">
		<?php	
			if(isset($_POST['update'])){
				// Variables.
				// Check to break the logic if something wrong happens in general.
				$check = true;
				// Check to break the logic if something wrong happens in uploads.
				$upload = true;
				// Get the input fields from the form.
				$enterprise_id = $id;
				$name = $_POST['name'];
				$area = $_POST['area'];
				$price = ($_POST['price'] == '') ? '0.00' : \Painel::moneySubmit($_POST['price']);
				
				// Get the input images from the form.
				$imgs_amount = count($_FILES['imgs']['name']);
				// Helper array.
				$imgs = array();
				// Check for no blank fields.
				if($name == '' || $price == '' || $area == ''){
					$check = false;
					\Painel::alert('error','Campos vazios não são permitidos!');
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
						if(!\File::validImg($cur_img)){
							\Painel::alert('error','A '.(($i)+1).'ª imagem selecionada é inválida!');
							$check = false;
							break;
						}else{
							array_push($img_names,\File::uploadFile($cur_img,'/buildings/'));
							// Check if the upload was ok.
							if(!$img_names[$i]){
								\Painel::alert('error','Ocorreu um erro ao fazer upload da '.(($i)+1).'ª imagem!');
								$check = false;
								$upload = false;
								break;
							}
						}
					}
				// Just allows the register of the product with, at least, one image.
				}
				// If everthing went correctly until here.
				if($check){
					// Prepare the array to insert into the database.
					$building = array('table'=>'tb_admin.buildings','id'=>$id,'enterprise_id'=>$enterprise_id,'name'=>$name,'price'=>$price,'area'=>$area);
					// Check if the insertion was ok.
					if(\Painel::updateData($building)){
						// Iterate to insert all the images into the database.
						if($_FILES['imgs']['name'][0] != ''){
							for($i=0; $i<count($img_names); $i++){
								// Check if the insertion was ok.
								if(!\Painel::insertData(array('table'=>'tb_admin.buildings-images','building_id'=>$id,'img'=>$img_names[$i]),0)){
									$upload = false;
									break;
								}
							}
							// If something went wrong in the upload or insertion in database.
							if(!$upload){
								// Clean the database.
								for($i=0; $i<count($img_names); $i++){
									\Painel::deleteData('tb_admin.buildings-images',' WHERE img = ?',array($img_names[$i]));
								}
								\Painel::alert('error','Ocorreu um erro ao atualizar o imóvel no banco de dados!');
							}
						}
						echo '<script>console.log("Tudo okay por aqui!");</script>';
						// If something went wrong in the insertion in database.

					}else{
						Painel::alert('error','Ocorreu um erro ao atualizar o imóvel no banco de dados!');
					}

				// Clean images uploaded to the website paste.
				}else if(!$check && (isset($img_names) && count($img_names) > 0 && !$upload)){
					for($i=0; $i<count($img_names); $i++){
						\File::deleteFile($img_names[$i],'/buildings/');
					}
				}
				// Everthing is ok.
				if($check && $upload){
					\Painel::redirectPage(INCLUDE_PATH_PAINEL.'edit-building?id='.$id.'&page='.$cur_page.'&updated');
				}
			}
			if(isset($_GET['updated'])){
				\Painel::alert('success','A atualização do imóvel foi realizado com sucesso!');
			}
			$building = \Painel::getData('tb_admin.buildings','*',' WHERE id = ?',array($id));
		?>
		<div class="group">
			<label>Nome do imóvel:</label>
			<input type="text" name="name" required value="<?php echo $building['name'];?>" />
		</div><!--group-->
		<div class="group">
			<label>Preço do imóvel:</label>
			<input type="text" name="price" required value="R$ <?php echo Painel::money($building['price']);?>" />
		</div><!--group-->
		<div class="group">
			<label>Área do imóvel(m²):</label>
			<input type="number" name="area" min="0" max="900" step="1" value="<?php echo $building['area'];?>" required />
		</div><!--group-->
		<div class="group">
			<label>Selecione as images:</label>
			<input type="file" name="imgs[]" multiple />
		</div><!--group-->
		<div class="group">
			<a box="confirm" class="delete" href="<?php pathPainel();?>edit-building?id=<?php echo $id;?>&page=<?php echo $cur_page;?>&deletebuilding=<?php echo $value['id'];?>"><i class="far fa-trash-alt"></i></i> Excluir Imóvel</a>
		</div><!--group-->
		<div class="group">
			<input type="submit" name="update" value="Atualizar Imóvel" />
		</div><!--group-->
	</form>
</div><!--box-->