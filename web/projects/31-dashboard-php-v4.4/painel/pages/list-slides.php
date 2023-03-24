<?php
	if(isset($_GET['delete'])){
		$id_del  = intval($_GET['delete']);
		$sel_img = Painel::getData('tb_site.slides', '*', 'WHERE id = ?', array($_GET['delete']));
		$img     = $sel_img['slide'];
		File::deleteFile($img, 'slides/');
		Painel::deleteData('tb_site.slides', "WHERE id = ?", array($id_del));
		Painel::redirectPage(INCLUDE_PATH_PAINEL.'list-slides');
	}else if(isset($_GET['order']) && isset($_GET['id']))
		Painel::orderData('tb_site.slides', $_GET['order'], $_GET['id']);
	$cur_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$per_page = PER_PAGE;
	$slides   = Painel::getData('tb_site.slides', '*', 'ORDER BY order_id ASC LIMIT '.($cur_page - 1) * $per_page.','.$per_page, array(), true, true);	
?>
<div class="box">

	<h2><i class="far fa-list-alt"></i> Slides Cadastrados</h2>
	<div class="wraper-table">
		<table>
			<tr>
				<td><i class="fas fa-signature"></i> Nome</td>
				<td><i class="far fa-file-image"></i> Arquivo</td>
				<td><i class="fas fa-file-image"></i> Imagem</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#</td>
				<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;#</td>
				<td>&nbsp;&nbsp;#</td>
				<td>&nbsp;&nbsp;#</td>
			</tr>
			<?php foreach ($slides as $key => $value) { ?>
				<tr>
					<td><?php echo $value['name']; ?></td>
					<td><?php echo $value['slide']; ?></td>
					<td><img src="<?php pathPainel(); ?>uploads/slides/<?php echo $value['slide']; ?>"></td>
					<td><a class="edit" href="<?php pathPainel(); ?>edit-slide?id=<?php echo $value['id'];?>"><i class="fas fa-pencil-alt"></i> Editar</a></td>
					<td><a box="confirm" class="del" href="<?php pathPainel(); ?>list-slides?delete=<?php echo $value['id'];?>"><i class="far fa-trash-alt"></i></i> Excluir</a></td>
					<td><a href="<?php pathPainel(); ?>list-slides?order=up&id=<?php echo $value['id']; ?>"><i class="fas fa-angle-up"></i></a></td>
					<td><a href="<?php pathPainel(); ?>list-slides?order=down&id=<?php echo $value['id']; ?>"><i class="fas fa-angle-down"></i></a></td>
				</tr>
			<?php } ?>
		</table>
	</div><!--wraper-table-->

	<div class="pagination">
		<?php
			// Total pages is definid by ceiling the number of elementes on the table divided
			// by the number that you want to have showed per page.
			$tot_pages = ceil(count(Painel::getData('tb_site.slides', '*', '', array(), true, true)) / $per_page);
			for($i = 1; $i <= $tot_pages; $i++){
				if($i == $cur_page)
					echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'list-slides?page='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'list-slides?page='.$i.'">'.$i.'</a>';
			}
		?>
	</div><!--pagination-->

</div><!--box-->