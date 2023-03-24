<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />
        <link href="<?php pathStatic();?>styles/feed.css" rel="stylesheet" />
        <link href="<?php pathStatic();?>styles/profile.css" rel="stylesheet" />
        <title>Bem vindo <?php echo $_SESSION['name'];?></title>
    </head>
    <body>
    	<section class="feed">
       		<?php include(BASE_DIR_STATIC.'sidebar.php');?>
        	<main>
                <div class="edit-profile">
                	<h2>Editando Perfil:</h2>
                	<?php
                		if(isset($_SESSION['img']) && $_SESSION['img'] == ''){
                			echo '<img alt="profile_pic" title="profile_pic" src="'.INCLUDE_PATH_STATIC.'images/avatar.jpg" />';
                		}else{
                			echo '<img alt="profile_pic" title="profile_pic" src="'.INCLUDE_PATH_STATIC.'images/'.$_SESSION['img'].'" />';
                		}
                	?>
                	<form enctype="multipart/form-data" method="post">
                		<input type="text" name="name" value="<?php echo $_SESSION['name'];?>" required />
                		<input type="email" name="email" value="<?php echo $_SESSION['login'];?>" required />
                		<input type="password" name="password" placeholder="Sua nova senha..." />
                		<input type="file" name="img" />
                		<input type="submit" name="update_profile" value="Atualizar" />
                	</form>
                </div><!--edit-profile-->
        	</main>
        </section><!--feed-->
    </body>
</html>