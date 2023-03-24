		<h2>Estou na home!</h2>
		<ul>
		<?php
			$clients = \Models\HomeModel::getClients();
			foreach($clients as $key => $value){
		?>
	<li><?php echo $value['name'];?></li>
		<?php } ?>
</ul>