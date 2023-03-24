<?php
	if(isset($par[2])){
		$id = (int)$par[2];
		$enterprise = Painel::getData('tb_admin.enterprises','*',' WHERE id = ?',array($id),false);
		if($enterprise->rowCount() == 0){
			Painel::alert('error','O Empreendimento que você quer editar não existe!');
			die();
		}
		$enterprise = $enterprise->fetch();
	}else{
		Painel::alert('error', 'Você precisa passar o parâmetro ID!');
		die();
	}
?>
<div class="box">
	<h2><i class="fas fa-building"></i> Editar Empreendimento: <?php echo $enterprise['name'];?></h2>
	<div class="box-info">
		<div class="row row-one left">
			<div class="boxes-title"><i class="fas fa-file-image"></i> Imagem do Empreendimento:</div><!--box-title-->
			<img class="w100" alt="<?php echo $enterprise['name'];?>" src="<?php images();?>/enterprises/<?php echo $enterprise['img'];?>">
		</div><!--row row-one-->
		<div class="row row-two left">
			<div class="boxes-title"><i class="fas fa-file-image"></i> Informações do Empreendimento:</div><!--box-title-->
			<p><strong><i class="fas fa-signature"></i> Nome: </strong><?php echo $enterprise['name'];?></p>
			<p><strong><?php echo ($enterprise['type'] == 'residential') ? '<i class="fas fa-home"></i>' : '<i class="fas fa-building"></i>'?> Tipo: </strong><?php echo ($enterprise['type'] == 'residential') ? 'Residencial' : 'Comercial'?></p>
		</div><!--row row-two-->

		<div class="clear"></div><!--clear-->
	</div><!--box-info-->
		
	<div class="wraper-table box-wraper-table">
		<div class="boxes-title"><i class="fas fa-file-image"></i> Imóveis do Empreendimento:</div><!--box-title-->
		<table>
			<tr>
				<td><i class="fas fa-signature"></i> Nome</td>
				<td><i class="far fa-calendar-minus"></i> Preço</td>
				<td><i class="fas fa-ruler-combined"></i> Área</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fas fa-pencil-alt"></i></td>
			</tr>
			<?php
				$buildings = Painel::getData('tb_admin.buildings','*',' WHERE enterprise_id = ?',array($id),true,true);
				if(count($buildings)){
					foreach($buildings as $key => $value){
			?>
					<tr>
						<td><?php echo $value['name'];?></td>
						<td><?php echo 'R$ '.Painel::money($value['price']);?></td>
						<td><?php echo $value['area'];?> m²</td>
						<td><a class="edit" href="<?php pathPainel();?>edit-building?id=<?php echo $value['id'];?>"><i class="fas fa-pencil-alt"></i> Editar</a></td>
					</tr>
			<?php
			 		}
				}else{
			?>
				<tr>
					<td>-----</td>
					<td>R$ ---,--</td>
					<td>--- m²</td>
					<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;---</a></td>
				</tr>
			<?php } ?>
		</table>
	</div><!--wraper-table-->
	
	<div class="boxes-title"><i class="fas fa-file-image"></i> Cadastrar Imóvel:</div><!--box-title-->
	<form method="post" enctype="multipart/form-data">
		<?php
			if(isset($_POST['register'])){
				// Variables.
				// Check to break the logic if something wrong happens in general.
				$check = true;
				// Check to break the logic if something wrong happens in uploads.
				$upload = true;
				// Get the input fields from the form.
				$enterprise_id = $id;
				$name = $_POST['name'];
				$area = $_POST['area'];
				$price = $_POST['price'];

				if($_POST['price'] == '')
					$price = '0.00';
				else{
					$price = str_replace('.','',$_POST['price']);
					$price = str_replace(',','.',$price);
					$price = str_replace('R$ ','',$price);
				}

				// Get the input images from the form.
				$imgs_amount = count($_FILES['imgs']['name']);
				// Helper array.
				$imgs = array();
				// Check for no blank fields.
				if($name == '' || $price == '' || $area == ''){
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
							array_push($img_names,File::uploadFile($cur_img,'/buildings/'));
							// Check if the upload was ok.
							if(!$img_names[$i]){
								Painel::alert('error','Ocorreu um erro ao fazer upload da '.(($i)+1).'ª imagem!');
								$check = false;
								$upload = false;
								break;
							}
						}
					}
				// Just allows the register of the building with, at least, one image.
				}else{
					$check = false;
					Painel::alert('error','Você precisa selecionar pelo menos uma imagem válida!');
				}
				// If everthing went correctly until here.
				if($check){
					// Prepare the array to insert into the database.
					$building = array('table'=>'tb_admin.buildings','enterprise_id'=>$enterprise_id,'name'=>$name,'price'=>$price,'area'=>$area,'order_id'=>0);
					// Check if the insertion was ok.
					if(Painel::insertData($building)){
						// Get the building id that was inserted.						
						$building = Painel::getData('tb_admin.buildings','*','','',true,true);
						$building_id = $building[count($building)-1]['id'];
						// Iterate to insert all the images into the database.
						for($i=0; $i<count($img_names); $i++){
							// Check if the insertion was ok.
							if(!Painel::insertData(array('table'=>'tb_admin.buildings-images','building_id'=>$building_id,'img'=>$img_names[$i]),false)){
								$upload = false;
								break;
							}
						}
						// If something went wrong in the upload or insertion in database.
						if(!$upload){
							// Clean the database.
							Painel::deleteData('tb_admin.buildings-images',' WHERE building_id = ?',array($building_id));
							Painel::deleteData('tb_admin.building',' WHERE id = ?',array($building_id));
							Painel::alert('error','Ocorreu um erro ao cadastrar o imóvel no banco de dados!');
						}
						// If something went wrong in the insertion in database.
					}else{
						Painel::alert('error','Ocorreu um erro ao cadastrar o imóvel no banco de dados!');
					}
				// Clean images uploaded to the website paste.
				}else if(!$check && (isset($img_names) && count($img_names) > 0 && !$upload)){
					for($i=0; $i<count($img_names); $i++){
						File::deleteFile($img_names[$i],'/$buildings/');
					}
				}
				// Everthing is ok.
				if($check && $upload){
					Painel::redirectPage(INCLUDE_PATH_PAINEL.'/edit-enterprise/'.$id.'?registered');
				}
			}
			if(isset($_GET['registered'])){
				Painel::alert('success','O cadastro do imóvel foi realizado com sucesso!');
			}
		?>
		<div class="group">
			<label>Nome:</label>
			<input type="text" name="name" required />
		</div><!--group-->
		<div class="group">
			<label>Preço:</label>
			<input type="text" name="price" required />
		</div><!--group-->
		<div class="group">
			<label>Área (m²):</label>
			<input type="number" name="area" min="0" max="1000000000" step="1" value="0" required />
		</div><!--group-->
		<div class="group">
			<label>Selecione as images:</label>
			<input type="file" name="imgs[]" multiple />
		</div><!--group-->
		<div class="group">
			<input type="submit" name="register" value="Cadastrar Imóvel" />
		</div><!--group-->
	</form>
</div><!--box-->

