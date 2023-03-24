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
	<section class="schedule">
		<div class="container">
			<?php
				if(isset($_POST['send'])){
					$check = true;
					if(isset($_SESSION['date_post'])){
						$sql = \MySQL::connect()->prepare('SELECT * FROM `schedule` WHERE `time` = ?');
						$sql->execute([$_SESSION['date_post'][-1]]);
						if($sql->rowCount() > 0)
							$check = false;
					}
					if($check && (isset($_POST['date']) && $_POST['date'] != '')){
						$name = $_POST['name'];
						if($name == '')
							$name = 'default';
						$date_post = $_POST['date'];
						$date_post = DateTime::createFromFormat('d/m/Y H:i:s',$date_post);
						$date_post = $date_post->format('Y-m-d H:i:s');
						$sql = \MySQL::connect()->prepare('INSERT INTO `schedule` VALUES(null,?,?)');
						$sql->execute([$name,$date_post]);
						$_SESSION['date_post'][] = $date_post;
						header('Location: '.INCLUDE_PATH.'?success');
						die(); 
					}
				}
				if(isset($_GET['success'])){
					echo '<div class="alert success" style="display:none;">Seu horário foi agendado com sucesso!</div>';
					echo '<script>$(function(){$(".success").fadeIn().delay(5000).fadeOut("slow");});</script>';
				}
			?>
			<form method="post">
				<input type="text" name="name" placeholder="Seu nome..." required />
				<select name="date">
					<?php
						for($i=0;$i<=23;$i++){
							$hour = $i;
							if($i<10){
								$hour = str_pad($i, 2, '0', STR_PAD_LEFT); 
							}
							$hour .= ':00:00';

							$check = date('Y-m-d').' '.$hour;
							$sql = \MySQL::connect()->prepare('SELECT * FROM `schedule` WHERE `time` = ?');
							$sql->execute([$check]);
							if($sql->rowCount() == 0 && strtotime($check) > time()){
								$date = date('d/m/Y').' '.$hour;
								echo '<option value="'.$date.'">'.$date.'</option>';
							}
						}
					?>
				</select>
				<input type="submit" name="send" value="Enviar" />
			</form>
		</div><!--container-->
	</section><!--schedule-->
	
</body>
</html>