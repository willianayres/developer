<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />
        <link href="<?php pathStatic();?>styles/feed.css" rel="stylesheet" />
        <link href="<?php pathStatic();?>styles/community.css" rel="stylesheet" />
        <title>Bem vindo <?php echo $_SESSION['name'];?></title>
	</head>

	<body>
		<section class="feed">
			<?php include(BASE_DIR_STATIC.'sidebar.php');?>
			<main>
				<div class="feed-wraper-community">
					<div class="comunidade">
						<div class="container-comunidade">
							<h4>Amigos</h4>
							<div class="container-comunidade-wraper">
								<?php
									foreach(\Classes\Models\CommunityModel::listFriendships() as $key => $value){
								?>
								<div class="container-comunidade-single">
									<div class="img-comunidade-user-single">
										<?php if($value['img'] == ''){ ?>
											<img alt="Willian" title="Willian" src="<?php pathStatic();?>images/avatar.jpg" />
										<?php }else{ ?>
											<img alt="Willian" title="Willian" src="<?php pathStatic();?>images/<?php echo $value['img'];?>" />
										<?php } ?>
									</div>
									<div class="info-comunidade-user-single">
										<h2><?php echo $value['name'];?></h2>
										<p><?php echo $value['email'];?></p>
									</div>
								</div><!--container-comunidade-single-->
								<?php } ?>
							</div><!--container-comunidade-wraper-->
						</div><!--container-comunidade-->
						<br/>
						<div class="container-comunidade">
							<h4>Comunidade</h4>
							<div class="container-comunidade-wraper">
								<?php
									$community = \Classes\Models\CommunityModel::listCommunity();
									foreach($community as $key => $value){
										$check_friendship = \Classes\Models\CommunityModel::checkFriendship($value['id']);
										if($check_friendship->rowCount() == 1)
											continue;

										if($value['id'] == $_SESSION['id'])
											continue;
								?>
								<div class="container-comunidade-single">
									<div class="img-comunidade-user-single">
										<img alt="Willian" title="Willian" src="<?php pathStatic();?>images/avatar.jpg" />
									</div><!--img-comunidade-user-single-->
									<div class="info-comunidade-user-single">
										<h2><?php echo $value['name'];?></h2>
										<p><?php echo $value['email'];?></p>
										<div class="btn-solicitar-amizade">
											<?php if(\Classes\Models\CommunityModel::issetRequestFriendship($value['id'])){ ?>
												<a href="<?php path();?>comunidade?solicitarAmizade=<?php echo $value['id'];?>">Solicitar Amizade</a>
											<?php }else{ ?>
												<a href="javascript:void(0);" style="border:0;color:orange;">Pedido Pendente</a>
											<?php } ?>
										</div><!--btn-solicitar-amizade-->
									</div><!--info-comunidade-user-single-->
								</div><!--container-comunidade-single-->
								<?php } ?>
							</div><!--container-comunidade-wraper-->
						</div><!--container-comunidade-->
					</div><!--comunidade-->
				</div><!--feed-->
			</main>
		</section>
	</body>
</html>