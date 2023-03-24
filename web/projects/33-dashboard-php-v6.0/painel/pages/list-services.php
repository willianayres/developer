<?php
	if(isset($_GET['delete'])){
		$id_del = intval($_GET['delete']);
		Painel::deleteData('tb_site.services'," WHERE id = ?",array($id_del));
		Painel::redirectPage(INCLUDE_PATH_PAINEL.'list-services');
	}else if(isset($_GET['order']) && isset($_GET['id']))
		Painel::orderData('tb_site.services', $_GET['order'], $_GET['id']);
	$cur_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$per_page = PER_PAGE;
	$services = Painel::getData('tb_site.services','*',' ORDER BY order_id ASC LIMIT '.($cur_page - 1) * $per_page.','.$per_page, array(), true, true);
?>
<div class="box">
	<h2><i class="far fa-list-alt"></i> Serviços Cadastrados</h2>
	<div class="wraper-table">
		<table>
			<tr>
				<td><i class="fas fa-sitemap"></i> Serviço</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#</td>
				<td>&nbsp;&nbsp;#</td>
				<td>&nbsp;&nbsp;#</td>
			</tr>
			<?php foreach($services as $key => $value){ ?>
				<tr>
					<td><?php echo $value['service']; ?></td>
					<td><a class="edit" href="<?php pathPainel(); ?>edit-service?id=<?php echo $value['id'];?>"><i class="fas fa-pencil-alt"></i> Editar</a></td>
					<td><a box="confirm" class="del" href="<?php pathPainel(); ?>list-services?delete=<?php echo $value['id'];?>"><i class="far fa-trash-alt"></i></i> Excluir</a></td>
					<td><a href="<?php pathPainel(); ?>list-services?order=up&id=<?php echo $value['id']; ?>"><i class="fas fa-angle-up"></i></a></td>
					<td><a href="<?php pathPainel(); ?>list-services?order=down&id=<?php echo $value['id']; ?>"><i class="fas fa-angle-down"></i></a></td>
				</tr>
			<?php } ?>
		</table>
	</div><!--wraper-table-->
	<div class="pagination">
		<?php
			// Total pages is definid by ceiling the number of elementes on the table divided
			// by the number that you want to have showed per page.
			$tot_pages = ceil(count(Painel::getData('tb_site.services','*','',array(),true,true)) / $per_page);
			for($i=1; $i<=$tot_pages; $i++){
				if($i == $cur_page)
					echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'list-services?page='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'list-services?page='.$i.'">'.$i.'</a>';
			}
		?>
	</div><!--pagination-->
</div><!--box-->