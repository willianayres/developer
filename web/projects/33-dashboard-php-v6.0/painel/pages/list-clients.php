<?php 
	$search = isset($_GET['search']) ? $_GET['search'] : '';
	$query_search = ($search != '') ? " WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR number LIKE '%$search%'" : '';
	$cur_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$per_page = PER_PAGE;
?>
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
		$query = $query_search;
		$query .= 'ORDER BY id ASC LIMIT '.($cur_page - 1) * $per_page.','.$per_page;
		if(isset($_POST['action'])){
			$search_url = $_POST['search'];
			$url = pathPainel()."list-clients?search=".$search_url;
			Painel::redirectPage($url);
		}
	?>
	<div class="boxes">
		<?php
			$clients = Painel::getData('tb_admin.clients','*',$query,'',true,true);
			$clients_search = Painel::getData('tb_admin.clients','*',$query_search,'',true,true);
			if(isset($_GET['search'])){
				echo '<div class="search-result"><p>Foram encontrados <strong>'.count($clients_search).'</strong> resultado(s).</p></div>';
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
							<a class="edit" href="<?php pathPainel();?>edit-client?id=<?php echo $value['id'];?>"><i class="fas fa-pencil-alt"></i> Editar</a>
							<a box="confirm" class="del" href="" item_id="<?php echo $value['id'];?>"><i class="far fa-trash-alt"></i></i> Excluir</a>
						</div><!--buttons-->
					</div><!--body-->
				</div><!--box-single-->
			</div><!--boxes-wraper-->
		<?php } ?>
		<div class="clear"></div><!--clear-->
	</div><!--boxes-->
	<div class="pagination">
		<?php
			// Total pages is definid by ceiling the number of elementes on the table divided
			// by the number that you want to have showed per page.
			$tot_pages = ceil(count(Painel::getData('tb_admin.clients', '*', $query_search, '', true, true)) / $per_page);
			for($i=1; $i<=$tot_pages; $i++){
				if($i == $cur_page){
					if(isset($_GET['search']))
						echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'list-clients?search='.$search.'&page='.$i.'">'.$i.'</a>';
					else
						echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'list-clients?page='.$i.'">'.$i.'</a>';
					
				}else{
					if(isset($_GET['search']))
						echo '<a href="'.INCLUDE_PATH_PAINEL.'list-clients?search='.$search.'&page='.$i.'">'.$i.'</a>';
					else
						echo '<a href="'.INCLUDE_PATH_PAINEL.'list-clients?page='.$i.'">'.$i.'</a>';
					
				}
			}
		?>
	</div><!--pagination-->
</div><!--box-->