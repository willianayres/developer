<?php 
	$search = isset($_GET['search']) ? $_GET['search'] : '';
	$query_search = ($search != '') ? " WHERE amount > 0 AND name LIKE '%$search%'" : ' WHERE amount > 0';
	$cur_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$per_page = 12;
	if(!isset($_GET['missing'])){
?>
<div class="box">
	<h2><i class="fas fa-boxes"></i> Produtos no Estoque</h2>
	<?php
		if(isset($_GET['delete'])){
			// Will start the process do delete the product.
			$id = (int)$_GET['delete'];
			$imgs = \Painel::getData('tb_admin.storage-images','*',' WHERE product_id = ?',array($id),1,1);
			\Painel::deleteData('tb_admin.storage-images',' WHERE product_id = ?',array($id));
			foreach($imgs as $key => $value){
				\File::deleteFile($value['img'],'/storage/');
			}
			\Painel::deleteData('tb_admin.storage',' WHERE id = ?',array($id));
			\Painel::alert('success','O produto foi deletado do estoque com sucesso!');
		}
		if(isset($_POST['update'])){
			$amount = $_POST['amount'];
			$product_id = $_POST['product_id'];
			if($amount < 0){
				\Painel::alert('error','Você não pode atualizar a quantidade para menor que 0.');
			}else{
				if(\Painel::updateData(array('table'=>'tb_admin.storage','id'=>$product_id,'amount'=>$amount)))
				\Painel::alert('success','Você atualizou a quantidade do produto com ID: '.$_POST['product_id'].'');
			}
		}
		$amount = \Painel::getData('tb_admin.storage','*',' WHERE amount = ?',array(0),0);
		if($amount->rowCount() > 0){
			\Painel::alert('attention','Você está com produtos em falta! Clique <a href="'.INCLUDE_PATH_PAINEL.'list-products?missing">aqui</a> para visualizalos.');
		}
	?>
	<div class="search">
		<form method="post">
			<h3><i class="fas fa-search"></i>Realizar uma busca:</h3>
			<input type="text" name="search" placeholder="Procure pelo Nome do produto" />
			<input type="submit" name="action" value="Buscar!" />
		</form>
	</div><!--search-->
	<?php
		$query = $query_search;
		$query .= ' ORDER BY id ASC LIMIT '.($cur_page - 1) * $per_page.','.$per_page;
		if(isset($_POST['action'])){
			$search_url = $_POST['search'];
			$url = pathPainel()."list-products?search=".$search_url;
			\Painel::redirectPage($url);
		}
	?>
	<div class="boxes">
		<?php
			$products = \Painel::getData('tb_admin.storage','*',$query,[],1,1);
			$products_search = count(\Painel::getData('tb_admin.storage','*',$query_search,[],1,1));
			if(isset($_GET['search'])){
				echo '<div class="search-result"><p>Foram encontrados <strong>'.$products_search.'</strong> resultado(s).</p></div>';
			}
			foreach($products as $value){
				$product_img = \Painel::getData('tb_admin.storage-images','*',' WHERE product_id = ? LIMIT 1',array($value['id']),1);
		?>
			<div class="boxes-wraper">
				<div class="boxes-wraper-inside">
					<div class="boxes-imgs">
						<?php if($product_img == ''){ ?>
							<h2><i class="fas fa-parachute-box"></i></h2>
						<?php }else{ ?>
							<img class="img-square" alt="<?php //echo $value['name'];?>Camisetas" src="<?php images();?>/storage/<?php echo $product_img['img'];?>" />
						<?php }?>
					</div><!--boxes-imgs-->
					<div class="box-single-divide">
						<div class="body">
							<p><strong><i class="fas fa-box"></i> Nome:</strong></p>
							<span><?php echo $value['name'];?></span>
							<p><strong><i class="fas fa-align-left"></i> Derscrição:</strong></p>
							<span><?php echo $value['description'];?></span>
							<p><strong><i class="fas fa-ruler-horizontal"></i> Largura:</strong></p>
							<span><?php echo $value['width'];?> cm</span>
							<p><strong><i class="fas fa-ruler-vertical"></i> Altura:</strong></p>
							<span><?php echo $value['height'];?> cm</span>
							<p><strong><i class="fas fa-ruler"></i> Comprimento:</strong></p>
							<span><?php echo $value['length'];?> cm</span>
							<p><strong><i class="fas fa-weight-hanging"></i> Peso:</strong></p>
							<span><?php echo $value['weight'];?> cm</span>
							<div class="buttons-middle">
								<form method="post">
									<label>Quantidade atual:</label>
									<input type="number" name="amount" min="0" max="999" step="1" value="<?php echo $value['amount'];?>" required />
									<input type="hidden" name="product_id" value="<?php echo $value['id'];?>">
									<input type="submit" name="update" value="Atualizar">
								</form>
							</div><!--buttons-->
							<div class="buttons">
								<a class="edit" href="<?php pathPainel(); ?>edit-product?id=<?php echo $value['id'];?>"><i class="fas fa-pencil-alt"></i> Editar</a>
								<a box="confirm" class="delete" href="<?php pathPainel();?>list-products?delete=<?php echo $value['id'];?>"><i class="far fa-trash-alt"></i></i> Excluir</a>
							</div><!--buttons-->
						</div><!--body-->
					</div><!--box-single-->
				</div><!--boxes-wraper-inside-->
			</div><!--boxes-wraper-->
		<?php } ?>
		<div class="clear"></div><!--clear-->
	</div><!--boxes-->
	<div class="pagination">
		<?php
			// Total pages is definid by ceiling the number of elementes on the table divided
			// by the number that you want to have showed per page.
			$tot_pages = ceil(count(\Painel::getData('tb_admin.storage','*',$query_search,[],1,1)) / $per_page);
			for($i=1; $i<=$tot_pages; $i++){
				if($i == $cur_page){
					if(isset($_GET['search']))
						echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'list-products?search='.$search.'&page='.$i.'">'.$i.'</a>';
					else
						echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'list-products?page='.$i.'">'.$i.'</a>';
					
				}else{
					if(isset($_GET['search']))
						echo '<a href="'.INCLUDE_PATH_PAINEL.'list-products?search='.$search.'&page='.$i.'">'.$i.'</a>';
					else
						echo '<a href="'.INCLUDE_PATH_PAINEL.'list-products?page='.$i.'">'.$i.'</a>';	
				}
			}
		?>
	</div><!--pagination-->
</div><!--box-->

<?php }else{ ?>
	<div class="box">
		<h2><i class="fas fa-boxes"></i> <a href="<?php echo pathPainel();?>list-products">Produtos no Estoque</a> >> Produtos em Falta no Estoque</h2>
	<?php
		if(isset($_GET['delete'])){
			// Will start the process do delete the product.
			$id = (int)$_GET['delete'];
			$imgs = \Painel::getData('tb_admin.storage-images','*',' WHERE product_id = ?',array($id),1,1);
			\Painel::deleteData('tb_admin.storage-images',' WHERE product_id = ?',array($id));
			foreach($imgs as $key => $value){
				\File::deleteFile($value['img'],'/storage/');
			}
			\Painel::deleteData('tb_admin.storage',' WHERE id = ?',array($id));
			\Painel::alert('success','O produto foi deletado do estoque com sucesso!');
		}
		if(isset($_POST['update'])){
			$amount = $_POST['amount'];
			$product_id = $_POST['product_id'];
			if($amount < 0){
				\Painel::alert('error','Você não pode atualizar a quantidade para menor que 0.');
			}else{
				if(\Painel::updateData(array('table'=>'tb_admin.storage','id'=>$product_id,'amount'=>$amount)))
				\Painel::alert('success','Você atualizou a quantidade do produto com ID: '.$_POST['product_id'].'');
			}
		}
		$query = ' WHERE amount = ? ORDER BY id ASC LIMIT '.($cur_page - 1) * $per_page.','.$per_page;
		$products = \Painel::getData('tb_admin.storage','*',$query,array(0),1,1);
		if(count($products) > 0)
			\Painel::alert('attention','Todos os produtos listados abaixo estão em falta no seu estoque!');
		else
			\Painel::alert('success','Tudo ok! Você não possui nenhum produto em falta no seu estoque!');
	?>

	<div class="boxes">
		<?php
			foreach($products as $value){
				$product_img = \Painel::getData('tb_admin.storage-images','*',' WHERE product_id = ? LIMIT 1',array($value['id']),1)['img'];
		?>
			<div class="boxes-wraper">
				<div class="boxes-wraper2">
					<div class="box-imgs">
						<img alt="<?php //echo $value['name'];?>Camisetas" src="<?php images();?>/storage/<?php echo $product_img;?>" />
					</div><!--box-imgs-->
					<div class="box-single box-single-divide">
						<div class="body">
							<p><strong><i class="fas fa-box"></i> Nome do Produto:</strong></p>
							<span><?php echo $value['name'];?></span>
							<p><strong><i class="fas fa-align-left"></i> Derscrição:</strong></p>
							<span><?php echo $value['description'];?></span>
							<p><strong><i class="fas fa-ruler-horizontal"></i> Largura:</strong></p>
							<span><?php echo $value['width'];?> cm</span>
							<p><strong><i class="fas fa-ruler-vertical"></i> Altura:</strong></p>
							<span><?php echo $value['height'];?> cm</span>
							<p><strong><i class="fas fa-ruler"></i> Comprimento:</strong></p>
							<span><?php echo $value['length'];?> cm</span>
							<p><strong><i class="fas fa-weight-hanging"></i> Peso:</strong></p>
							<span><?php echo $value['weight'];?> cm</span>
							<div class="buttons buttons-middle">
								<form method="post">
									<label>Quantidade atual:</label>
									<input type="number" name="amount" min="0" max="999" step="1" value="<?php echo $value['amount'];?>" required />
									<input type="hidden" name="product_id" value="<?php echo $value['id'];?>">
									<input type="submit" name="update" value="Atualizar">
								</form>
							</div><!--buttons-->
							<div class="buttons">
								<a class="edit" href="<?php pathPainel(); ?>edit-product?id=<?php echo $value['id'];?>"><i class="fas fa-pencil-alt"></i> Editar</a>
								<a box="confirm" class="delete" href="<?php pathPainel();?>list-products?delete=<?php echo $value['id'];?>"><i class="far fa-trash-alt"></i></i> Excluir</a>
							</div><!--buttons-->
						</div><!--body-->
					</div><!--box-single-->
				</div><!--boxes-wraper2-->
			</div><!--boxes-wraper-->
		<?php } ?>
		<div class="clear"></div><!--clear-->
	</div><!--boxes-->
	<div class="pagination">
		<?php
			// Total pages is definid by ceiling the number of elementes on the table divided
			// by the number that you want to have showed per page.
			$tot_pages = ceil(count(Painel::getData('tb_admin.storage','*',$query_search,[],1,1)) / $per_page);
			for($i=1; $i<=$tot_pages; $i++){
				if($i == $cur_page){
					if(isset($_GET['search']))
						echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'list-products?missing&search='.$search.'&page='.$i.'">'.$i.'</a>';
					else
						echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'list-products?missing&page='.$i.'">'.$i.'</a>';
				}else{
					if(isset($_GET['search']))
						echo '<a href="'.INCLUDE_PATH_PAINEL.'list-products?missing&search='.$search.'&page='.$i.'">'.$i.'</a>';
					else
						echo '<a href="'.INCLUDE_PATH_PAINEL.'list-products?missing&page='.$i.'">'.$i.'</a>';
				}
			}
		?>
	</div><!--pagination-->
	</div><!--box-->
<?php }?>