<?php
	include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/index.css" />
	<title>Sistema de Reserva</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
	<header>
		<div class="container">
			<div class="logo">
				<h2>Logomarca</h2>
			</div><!--logo-->
			<nav class="desktop">
				<ul>
					<li><a href="<?php echo INCLUDE_PATH;?>">Home</a></li>
				    <li><a href="<?php echo INCLUDE_PATH;?>">Reservas</a></li>
				    <li><a href="<?php echo INCLUDE_PATH;?>admin.php">Admin</a></li>
				</ul>
			</nav>
			<div class="clear"></div><!--clear-->
		</div><!--container-->
	</header>
	<section class="scheduled">
		<div class="container">
			<?php
				if(isset($_GET['success'])){
					echo '<div class="alert success" style="display:none;">Seu horário foi agendado com sucesso!</div>';
					echo '<script>$(function(){$(".success").fadeIn().delay(5000).fadeOut("slow");});</script>';
				}
				if(isset($_GET['del']) && !isset($_GET['success'])){
					if((isset($_SESSION['del']) && $_SESSION['del'][-1] != $_GET['del']) || !isset($_SESSION['del'])){
						$id = (int)$_GET['del'];
						\MySQL::connect()->exec('DELETE FROM `schedule` WHERE `id` = '.$id);
						header('Location: '.INCLUDE_PATH.'admin.php?success');
						$_SESSION['del'][] = $id;
						die();
					}
				}
				$sql = \MySQL::connect()->prepare('SELECT * FROM `schedule`');
				$sql->execute();
				$sql = $sql->fetchAll();
				foreach($sql as $key => $value){
			?>
				<div class="wraper">
					<div class="box-single">
						<p>Nome: <?php echo $value['name'];?></p>
						<p>Horário: <?php echo date('d/m/Y H:i:s',strtotime($value['time']));?></p>
						<p><a href="<?php echo INCLUDE_PATH;?>admin.php?del=<?php echo $value['id'];?>">Excluir</a></p>
					</div><!--box-single-->
				</div><!--wraper-->
			<?php } ?>
		</div><!--container-->
	</section><!--scheduled-->
	
</body>
</html>