<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" />
        <link href="<?php pathStatic();?>styles/feed.css" rel="stylesheet" />
        <title>Bem vindo <?php echo $_SESSION['name'];?></title>
    </head>
    <body>
    	<section class="feed">
       		<?php include(BASE_DIR_STATIC.'sidebar.php');?>
        	<main>
                <div class="feed-wraper">
                    <div class="feed-form">
                        <h2>Insira um post:</h2>
                        <form method="post">
                            <textarea name="msg" placeholder="No que você está pensando?" required></textarea>
                            <input type="hidden" name="post_feed" />
                            <input type="submit" name="send_post" value="Postar" />
                        </form>
                    </div><!--feed-form-->
                    <?php
                        $posts = \Classes\Models\HomeModel::retrieveFriendsPosts();
                        foreach($posts as $key => $value){
                    ?>
                    <div class="feed-single">
                        <div class="author">
                            <div class="img-author">
                                <?php if(isset($value['me'])){?>
                                    <?php if($_SESSION['img'] == ''){ ?>
                                        <img alt="profile_pic" title="profile_pic" src="<?php pathStatic();?>images/avatar.jpg" />
                                    <?php }else{ ?>
                                        <img alt="profile_pic" title="profile_pic" src="<?php pathStatic();?>images/<?php echo $_SESSION['img'];?>" />
                                    <?php } ?>
                                <?php }else{?>
                                    <?php if($value['img'] == ''){ ?>
                                        <img alt="profile_pic" title="profile_pic" src="<?php pathStatic();?>images/avatar.jpg" />
                                    <?php }else{ ?>
                                        <img alt="profile_pic" title="profile_pic" src="<?php pathStatic();?>images/<?php echo $value['img'];?>" />
                                    <?php } ?>
                                <?php }?>   
                            </div><!--img-author-->
                            <div class="text-author">
                                <?php if(isset($value['me'])){ ?>
                                    <h3><?php echo $_SESSION['name'];?> (eu)</h3>
                                <?php }else{ ?>
                                    <h3><?php echo $value['user'];?></h3>
                                <?php } ?>
                                <p><?php echo date('d/m/Y H:i:s',strtotime($value['date']));?></p>
                            </div><!--text-author-->
                        </div><!--author-->
                        <div class="content">
                            <?php echo $value['msg'];?>
                        </div><!--content-->
                    </div><!--feed-single-->
                    <?php } ?>
                </div><!--feed-wraper-->
                <div class="friends-feed-requests">
                    <h3>Solicitações de Amizade:</h3>
                    <?php
                        foreach(\Classes\Models\CommunityModel::listPendentRequests() as $key => $value){
                            $user_info = \Classes\Models\UsersModel::getUserById($value['sent']);
                    ?>
                    <div class="friend-request-single">
                        <img alt="Otávio da Silva" title="Otávio da Silva" src="<?php pathStatic();?>images/avatar.jpg" />
                        <div class="info">
                            <h4><?php echo $user_info['name'];?></h4>
                            <p><a href="<?php path();?>?aceitarAmizade=<?php echo $user_info['id'];?>">Aceitar</a> | <a href="<?php path();?>?recusarAmizade=<?php echo $user_info['id'];?>">Recusar</a></p>
                        </div><!--info-->
                    </div><!--friend-request-single-->
                    <?php } ?>
                </div><!--friends-feed-->
        	</main>
        </section><!--feed-->
    </body>
</html>