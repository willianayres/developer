<div class="box">

	<h2><i class="far fa-list-alt"></i> Clientes Cadastrados</h2>
	
	<div class="search">
		<form method="post">
			<h3><i class="fas fa-search"></i>Realizar uma busca:</h3>
			<input type="text" name="search" placeholder="Procure por: Nome, E-mail, CPF ou CNPJ" />
			<input type="submit" name="action" value="Buscar!" />
		</form>
	</div><!--search-->

	<?php
		$query = '';
		if(isset($_POST['action'])){
			$search = $_POST['search'];
			$query = " WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR number LIKE '%$search%'";
		}
	?>

	<div class="boxes">

		<?php
			$clients = Painel::getData('tb_admin.clients','*',$query,'',true,true);
			if(isset($_POST['action'])){
				echo '<div class="search-result"><p>Foram encontrados <strong>'.count($clients).'</strong> resultado(s).</p></div>';
			}
			foreach($clients as $value){ 
		?>

		<div class="boxes-wraper">
			<div class="box-single">
				<div class="top">
					<img alt="<?php echo $value['name'];?>" src="<?php images();?>clients/<?php echo $value['img'];?>" />
				</div><!--top-->
				<div class="body">
					<p><strong><i class="fas fa-signature"></i>Nome do Cliente:</strong> <?php echo $value['name'];?></p>
					<p><strong><i class="fas fa-envelope"></i>E-mail:</strong> <?php echo $value['email'];?></p>
					<p><strong><i class="fas fa-question"></i>Tipo de Cliente:</strong> <?php echo ($value['client_type'] == 'physical') ? 'Pessoa Física' : 'Pessoa Jurídica';?></p>
					<p><strong><i class="fas fa-id-card"></i><?php echo ($value['client_type'] == 'physical') ? 'CPF' : 'CNPJ';?>:</strong> <?php echo $value['number'];?></p>
					<div class="buttons">
						<a class="edit" href="<?php pathPainel(); ?>edit-client?id=<?php echo $value['id'];?>"><i class="fas fa-pencil-alt"></i> Editar</a>
						<a box="confirm" class="del" href="" item_id="<?php echo $value['id'];?>"><i class="far fa-trash-alt"></i></i> Excluir</a>
					</div><!--buttons-->
				</div><!--body-->
			</div><!--box-single-->
		</div><!--boxes-wraper-->

	<?php } ?>

		<div class="clear"></div><!--clear-->
	</div><!--boxes-->


</div><!--box-->