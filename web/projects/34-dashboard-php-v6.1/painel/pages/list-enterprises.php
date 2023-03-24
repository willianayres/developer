<?php 
	$search = isset($_GET['search']) ? $_GET['search'] : '';
	$query_search = ($search != '') ? " WHERE name LIKE '%$search%' OR type LIKE '%$search%' " : '';
	$cur_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$per_page = 12;
?>
<div class="box">
	<h2><i class="fas fa-city"></i> Empreendimentos</h2>

	<?php
		if(isset($_GET['delete'])){
			// Will start the process do delete the product.
			$id = (int)$_GET['delete'];
			$enterprise = \Painel::getData('tb_admin.enterprises','*',' WHERE id = ?',array($id),1);

			$buildings = \Painel::getData('tb_admin.buildings','id',' WHERE enterprise_id = ?',array($id),1,1);
			foreach($buildings as $key => $value){
				$building_imgs = Painel::getData('tb_admin.buildings-images','*',' WHERE building_id = ?',array($value['id']),1,1);
				foreach($building_imgs as $key2 => $value2){
					\File::deleteFile($value2['img'],'/buildings/');
				}
				\Painel::deleteData('tb_admin.buildings-images',' WHERE building_id = ?',array($value['id']));
				\Painel::deleteData('tb_admin.buildings',' WHERE id = ?',array($value['id']));
			}
			\File::deleteFile($enterprise['img'],'/enterprises/');
			\Painel::deleteData('tb_admin.enterprises',' WHERE id = ?',array($id));
			\Painel::deleteData('tb_admin.enterprises',' WHERE id = ?',array($id));

			Painel::alert('success','O Empreendimento "'.$enterprise['name'].'" foi deletado do Banco de Dados com sucesso!');
		}
	?>
	<div class="search">
		<form method="post">
			<h3><i class="fas fa-search"></i>Realizar uma busca:</h3>
			<input type="text" name="search" placeholder="Procure pelo Nome ou Tipo do Empreendimento" />
			<input type="submit" name="action" value="Buscar!" />
		</form>
	</div><!--search-->
	<?php
		$query = $query_search;
		$query .= ' ORDER BY order_id ASC LIMIT '.($cur_page - 1) * $per_page.','.$per_page;

		if(isset($_POST['action'])){
			$search_url = $_POST['search'];
			$url = pathPainel()."list-enterprises?search=".$search_url;
			\Painel::redirectPage($url);
		}
	?>
	<div class="boxes" id="sortable">
		<?php
			$enterprise = \Painel::getData('tb_admin.enterprises','*',$query,'',1,1);
			$enterprise_search = count(\Painel::getData('tb_admin.enterprises','*',$query_search,[],1,1));
			if(isset($_GET['search'])){
				echo '<div class="search-result"><p>Foram encontrados <strong>'.$enterprise_search.'</strong> resultado(s).</p></div>';
			}
			foreach($enterprise as $value){
		?>
			<div id="<?php echo 'ids_'.$value['id'];?>" class="boxes-wraper">
				<div class="boxes-wraper-inside">
					<div class="boxes-imgs">
						<?php if($value['img'] == ''){ ?>
							<h2><?php echo ($value['type'] == 'residential') ? '<i class="fas fa-home"></i>' : '<i class="fas fa-building"></i>'?></h2>
						<?php }else{ ?>
							<img class="img-square" alt="<?php echo $value['name'];?>" src="<?php images();?>/enterprises/<?php echo $value['img'];?>" />
						<?php }?>
					</div><!--boxes-imgs-->
					<div class="box-single-divide">
						<div class="body">
							<p><strong><i class="fas fa-box"></i> Nome:</strong></p>
							<span><?php echo $value['name'];?></span>
							<p><strong><?php echo ($value['type'] == 'residential') ? '<i class="fas fa-home"></i>' : '<i class="fas fa-building"></i>'?> Tipo:</strong></p>
							<span><?php echo ($value['type'] == 'residential') ? 'Residencial' : 'Comercial'?></span>
							<p><strong><i class="fas fa-dollar-sign"></i> Preço:</strong></p>
							<span><?php echo 'R$ '.Painel::money($value['price']);?></span>
							<div class="buttons">
								<a class="see" href="<?php pathPainel(); ?>edit-enterprise?id=<?php echo $value['id'];?>"><i class="far fa-eye"></i> Editar</a>
								<a box="confirm" class="delete" href="<?php pathPainel();?>list-enterprises?delete=<?php echo $value['id'];?>"><i class="far fa-trash-alt"></i></i> Excluir</a>
							</div><!--buttons-->
						</div><!--body-->
					</div><!--box-single-divided-->
				</div><!--boxes-wraper-inside-->
			</div><!--boxes-wraper-->
		<?php } ?>
	</div><!--boxes-->
	<div class="pagination">
		<?php
			// Total pages is definid by ceiling the number of elementes on the table divided
			// by the number that you want to have showed per page.
			$tot_pages = ceil(count(\Painel::getData('tb_admin.enterprises','*',$query_search,[],1,1)) / $per_page);
			for($i=1; $i<=$tot_pages; $i++){
				if($i == $cur_page){
					if(isset($_GET['search']))
						echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'list-enterprises?search='.$search.'&page='.$i.'">'.$i.'</a>';
					else
						echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'list-enterprises?page='.$i.'">'.$i.'</a>';
					
				}else{
					if(isset($_GET['search']))
						echo '<a href="'.INCLUDE_PATH_PAINEL.'list-enterprises?search='.$search.'&page='.$i.'">'.$i.'</a>';
					else
						echo '<a href="'.INCLUDE_PATH_PAINEL.'list-enterprises?page='.$i.'">'.$i.'</a>';
					
				}
			}
		?>
	</div><!--pagination-->
</div><!--box-->