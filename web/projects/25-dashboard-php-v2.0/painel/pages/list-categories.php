<?php
	if(isset($_GET['delete'])){
		$id_del = intval($_GET['delete']);
		Painel::deleteData('tb_site.categories', "WHERE id = ?", array($id_del));
		$notices = Painel::getData('tb_site.notices', '*', 'WHERE category_id = ?', array($id_del), true, true);
		foreach ($notices as $key => $value) {
			$img_del = $value['cape'];
			File::deleteFile($img_del, 'notices/');
		}
		$notices = Painel::deleteData('tb_site.notices', 'WHERE category_id = ?', array($id_del));
		Painel::redirectPage(INCLUDE_PATH_PAINEL.'list-categories');
	}else if(isset($_GET['order']) && isset($_GET['id']))
		Painel::orderData('tb_site.categories', $_GET['order'], $_GET['id']);
	$cur_page   = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$per_page   = PER_PAGE;
	$categories = Painel::getData('tb_site.categories', '*', 'ORDER BY order_id ASC LIMIT '.($cur_page - 1) * $per_page.','.$per_page, array(), true, true);
?>
<div class="box">

	<h2><i class="far fa-list-alt"></i> Categorias Cadastradas</h2>
	<div class="wraper-table">
		<table>
			<tr>
				<td><i class="fas fa-signature"></i> Nome</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#</td>
				<td>&nbsp;&nbsp;#</td>
				<td>&nbsp;&nbsp;#</td>
			</tr>
			<?php foreach ($categories as $key => $value) { ?>
				<tr>
					<td><?php echo $value['name']; ?></td>
					<td><a class="edit" href="<?php pathPainel(); ?>edit-category?id=<?php echo $value['id'];?>"><i class="fas fa-pencil-alt"></i> Editar</a></td>
					<td><a box="confirm" class="del" href="<?php pathPainel(); ?>list-categories?delete=<?php echo $value['id'];?>"><i class="far fa-trash-alt"></i></i> Excluir</a></td>
					<td><a href="<?php pathPainel(); ?>list-categories?order=up&id=<?php echo $value['id']; ?>"><i class="fas fa-angle-up"></i></a></td>
					<td><a href="<?php pathPainel(); ?>list-categories?order=down&id=<?php echo $value['id']; ?>"><i class="fas fa-angle-down"></i></a></td>
				</tr>
			<?php } ?>
		</table>
	</div><!--wraper-table-->

	<div class="pagination">
		<?php
			// Total pages is definid by ceiling the number of elementes on the table divided
			// by the number that you want to have showed per page.
			$tot_pages = ceil(count(Painel::getData('tb_site.categories', '*', '', array(), true, true)) / $per_page);

			for($i = 1; $i <= $tot_pages; $i++){
				if($i == $cur_page)
					echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'list-categories?page='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'list-categories?page='.$i.'">'.$i.'</a>';
			}

		?>
	</div><!--pagination-->

</div><!--box-->