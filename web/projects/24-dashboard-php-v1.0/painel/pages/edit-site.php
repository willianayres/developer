<?php $info = Painel::getData('tb_site.config'); ?>
<?php $type = Painel::dataType('tb_site.config'); ?>
<?php use Stichoza\GoogleTranslate\GoogleTranslate; ?>

<div class="box">

	<h2><i class="fas fa-code"></i> Editar Configurações do Site</h2>
	<form method="post" enctype="multipart/form-data">	
		<?php
			if(isset($_POST['action'])){
				$img1     = $_FILES['img_4'];
				$img2	  = $_FILES['img_14'];
				$cur_img1 = $_POST['cur_img_4'];
				$cur_img2 = $_POST['cur_img_14'];
				unset($_POST['cur_img_4']);
				unset($_POST['cur_img_14']);
				unset($_POST['img_4']);
				unset($_POST['img_14']);
				// Check if an image was selected.
				if($img1['name'] != '' && isset($img2['name'])){
					// Check if the image is in a valid format.
					if(File::validImg($img1)){
						// It Will delete the old image file.
						File::deleteFile($cur_img1, 'site/');
						// It Will upload the img.
						$img1  = File::uploadFile($img1, 'site/');
						$arr   = array_merge($_POST, array('author_image' => $img1));
						Painel::updateData($arr);
						$info  = Painel::getData('tb_site.config');
						Painel::alert('success','O site foi editado junto da imagem com sucesso!');
					}
					else
						Painel::alert('error','Formato de imagem inválido!');
				} else if($img2['name'] != '' && isset($img1['name'])){
					// Check if the image is in a valid format.
					if(File::validImg($img2, 1000, true)){
						// It Will delete the old image file.
						File::deleteFile($cur_img2, 'ajax/');
						// It Will upload the img.
						$img2  = File::uploadFile($img2, 'ajax/');
						$arr   = array_merge($_POST, array('ajax_image' => $img2));
						Painel::updateData($arr);
						$info  = Painel::getData('tb_site.config');
						Painel::alert('success','O site foi editado junto da imagem com sucesso!');
					}
					else
						Painel::alert('error','Formato de imagem inválido!');
				} else {
					$img1  = $cur_img1;
					$img2  = $cur_img2;
					$arr   = array_merge($_POST, array('author_image' => $img1, 'ajax_image' => $img2));
					Painel::updateData($arr);
					$info  = Painel::getData('tb_site.config');
					Painel::alert('success','O site foi editado com sucesso!');
				}
			}
		?>
		<?php
			for($i = 1; $i < count($info) / 2; $i++) {
				if($i == 4 || $i == 14){
		?>
				<div class="group">
					<label><?php echo ucwords(GoogleTranslate::trans(str_replace("_"," ", array_keys($info)[$i*2]), 'pt-br', 'en')); ?></label>
					<input type="file" name="img_<?php echo $i; ?>" />
					<input type="hidden" name="cur_img_<?php echo $i ?>" value="<?php echo $info[$i]; ?>" />
				</div><!--group-->
		<?php } else if($type[$i][0] == 'text'){ ?>
				<div class="group">
					<label><?php echo ucwords(GoogleTranslate::trans(str_replace("_"," ", array_keys($info)[$i*2]), 'pt-br', 'en')); ?></label>
					<textarea class="tinymce" name="<?php echo array_keys($info)[$i*2]; ?>"><?php echo $info[$i]; ?></textarea>
				</div><!--group-->
		<?php } else { ?>
				<div class="group">
					<label><?php echo ucwords(GoogleTranslate::trans(str_replace("_"," ", array_keys($info)[$i*2]), 'pt-br', 'en')); ?></label>
					<input type="text" name="<?php echo array_keys($info)[$i*2]; ?>" value="<?php echo $info[$i]; ?>" />
				</div><!--group-->
		<?php } } ?>
		<div class="group">
			<input type="hidden" name="id" value="<?php echo $info['id']; ?>" />
			<input type="hidden" name="table" value="tb_site.config" />
			<input type="submit" name="action" value="Atualizar!" />
		</div><!--group-->

	</form>

</div><!--box-->