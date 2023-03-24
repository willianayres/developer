<?php
	namespace Controllers;

	class CallController{

		public static function index($info){
			if(isset($_POST['call_response'])){
				\Models\CallModel::insertPost($_POST);
				echo '<script>alert("Sua respsota foi enviada com sucesso! Aguarde o admin responde-lo!");</script>';
				echo '<script>location.href="'.INCLUDE_PATH.'call?token='.$info['token'].'"</script>';
				die();
			}
			\Views\MainView::render('call/call',$info);
			$get_interactions = \Models\CallModel::getInteractions($info['token']);
			foreach($get_interactions as $key => $value){
				if($value['admin'] == 1)
					echo '<p><strong>Admin: </strong>'.$value['msg'].'</p>';
				else
					echo '<p><strong>Você: </strong>'.$value['msg'].'</p>';
				echo '<hr>';
			}
			$interactions = \Models\CallModel::getInteractions($info['token'],'ORDER BY `id` DESC',false);
			if($interactions->rowCount() == 0)
				echo '<p>Aguarde até ter uma respota do admin para continuar com o chamado!</p>';
			else{
				$interactions = $interactions->fetchAll();
				if($interactions[0]['admin'] == -1){
					// Last interaction was made by the user.
					\Views\MainView::render('call/no-response');
				}else{
					\Views\MainView::render('call/response',$info);
				}
			}	
		}
		public function issetToken($token){
			if(\Models\CallModel::issetToken($token)){
				return true;
			}
		}
		public function getCall($token){
			return \Models\CallModel::getCall($token);
		}
	}
?>