<!DOCTYPE html>
<html lang="pt-br">
	<head>

		<meta charset="utf-8" />
		<title><?php echo self::title; ?></title>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet" type="text/css" />
		<link href="<?php echo INCLUDE_PATH_FULL; ?>css/style.css" rel="stylesheet" type="text/css" />
	
	</head>
	
	<body>

		<header>
			
			<div class="container">
				<div class="logo left">
					<h2><a href="<?php echo INCLUDE_PATH;?>">Logomarca</h2>
				</div><!--logo-->
				<nav class="menu right">
					<ul>
						<?php foreach($this->nav as $key => $value){
							echo '<li><a href="'.INCLUDE_PATH.strtolower($value).'">'.$value.'</a></li>';
						} ?>
					</ul>
				</nav><!--menu-->
				<div class="clear"></div><!--clear-->
			</div><!--container-->

		</header>

		<main>

			<section class="title">

				<div class="container">
				
					<div class="wraper">
						<h1><?php echo $arr['title']; ?></h1>
					</div><!--wraper-->

				</div><!--container-->

			</section><!--title-->