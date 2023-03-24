<?php
	// Include the main config file.
	include('../config.php');
	// Variables.
	$data['msg'] = '';
    $data['data'] = '';
    $data['success'] = true;
    // Check if was requested to load more comments.
    if(isset($_POST['more']) && $_POST['more'] == 'more'){
        // Gets the notice ID and the amount of comments that were already loaded.
        $notice_id = $_POST['notice_id'];
        $amount = $_POST['amount'];
        $show_more = false;
        // Get the number of comments.
        $total_coments = \Painel::getData('tb_site.comments','*',' WHERE notice_id = ?',array($notice_id),0,0)->rowCount();
        // Get the number of comments remaning to be loaded.
        $parcial_comments = \Painel::getData('tb_site.comments','*',' WHERE notice_id = ? LIMIT '.($amount*5).','.$total_coments,array($notice_id),0,0);
        // Check if there is more comments to be loaded after this loading.
        if($parcial_comments->rowCount() > 5)
            $show_more = true;
        $comments = \Painel::getData('tb_site.comments','*',' WHERE notice_id = ? LIMIT '.($amount*5).',5',array($notice_id),0,0);
        $comments = $comments->fetchAll();
        // Iterate the loaded comments and append to the data return.
        foreach($comments as $key => $value){        

            $data['data'] .= '<div id="'.$value['id'].'" class="comment-notice">
                                <h3>'.$value['username'].'</h3>
                                <p>'.$value['comment'].'</p>
                                <div class="box-awnsers"></div><!--box-awnsers-->';
            $awnser_comments = \Painel::getData('tb_site.comments-awnsers','*',' WHERE comment_id = ?',array($value['id']),0,0);
            if($awnser_comments->rowCount() > 0){
                $data['data'] .= '<form class="show-awnsers" method="post">
                                    <input type="hidden" name="comment_id" value="'.$value['id'].'" />
                                    <input type="submit" name="show-awnsers" value ="Ver Respostas" />
                                  </form>';
            }
            $data['data'] .= '<button class="awnser"><i class="fas fa-reply"></i> Responder</button>
                              <form class="awnser" method="post">
                                <input type="hidden" name="name" value="'.$_SESSION['name_site'].'" />
                                <input type="hidden" name="notice_id" value="'.$notice_id.'" />
                                <textarea name="message" placeholder="Seu comentário..."></textarea>
                                <input type="hidden" name="comment_id" value="'.$value['id'].'" />
                                <input type="submit" name="awnser_comment" value="Responder" />
                              </form>
                              </div><!--comment-notice-->';

        }
        // If there is still more comments to be loaded.
        if($show_more){
            $data['data'] .= '<form class="more">
                                <input type="hidden" name="amount" value="'.($amount+1).'" />
                                <input type="hidden" name="notice_id" value="'.$notice_id.'" />
                                <input type="hidden" name="comment_scroll" value="'.$data['comments'].'" />
                                <input type="submit" name="more" value="Mostrar mais..." />
                              </form>';
                    }

    }
    // Check if was requested to load awnsers.
	if(isset($_POST['show-awnsers']) && $_POST['show-awnsers'] == 'show-awnsers'){
        $comment_id = $_POST['comment_id'];
        $data['comment_id'] = $comment_id;
        $show_more = false;
        $awnser_comments_total = \Painel::getData('tb_site.comments-awnsers','*',' WHERE comment_id = ?',array($comment_id),0,0);
        $awnser_comments = \Painel::getData('tb_site.comments-awnsers','*',' WHERE comment_id = ? LIMIT 0,3',array($comment_id),0,0);
        if($awnser_comments_total->rowCount() > 3)
            $show_more = true;
        $awnser_comments = $awnser_comments->fetchAll();
        //print_r($awnser_comments);
        foreach ($awnser_comments as $key => $value){
            $data['data'] .= '<div class="comment-notice-awnser">
                        <h3>'.$value['username'].'</h3>
                        <p>'.$value['comment'].'</p>
                      </div><!--comment-notice-awnser-->';
        }
        if($show_more){
            $data['data'] .= '<form class="show-more" method="post">
                                <input type="hidden" name="comment_id" value="'.$comment_id.'" />
                                <input type="hidden" name="start" value="3" />
                                <input type="submit" name="show-more" value="Mostrar mais..." />
                              </form>';
        }
	}
    // Check if was requested to load more awnsers.
    if(isset($_POST['show-more']) && $_POST['show-more'] == 'show-more'){
        $comment_id = $_POST['comment_id'];
        $data['comment_id'] = $comment_id;
        $start = $_POST['start'];
        $show_more = false;
        $awnser_comments_total = \Painel::getData('tb_site.comments-awnsers','*',' WHERE comment_id = ?',array($comment_id),0,0)->rowCount();
        $awnser_comments_parcial = \Painel::getData('tb_site.comments-awnsers','*',' WHERE comment_id = ? LIMIT '.$start.','.$awnser_comments_total,array($comment_id),0,0);
        $awnser_comments = \Painel::getData('tb_site.comments-awnsers','*',' WHERE comment_id = ? LIMIT '.$start.',3',array($comment_id),0,0);

        if($awnser_comments_parcial->rowCount() > 3){
            $show_more = true;
        }

        $awnser_comments = $awnser_comments->fetchAll();

        foreach ($awnser_comments as $key => $value){
            $data['data'] .= '<div class="comment-notice-awnser">
                        <h3>'.$value['username'].'</h3>
                        <p>'.$value['comment'].'</p>
                      </div><!--comment-notice-awnser-->';
        }
        if($show_more){
            $data['data'] .= '<form class="show-more" method="post">
                                <input type="hidden" name="comment_id" value="'.$comment_id.'" />
                                <input type="hidden" name="start" value="'.($start+3).'" />
                                <input type="submit" name="show-more" value="Mostrar mais..." />
                              </form>';
        }
	}
    die(json_encode($data));
?>