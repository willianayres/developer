<?php
	namespace Controllers;
	class AdminController{
		public static function index($info){
			$info = null;
			if(isset($_POST['awnser'])){
				\Models\AdminModel::insertPost($_POST);
				\Models\AdminModel::sendMail($_POST);
				echo '<script>alert("Você respondeu o usuário!");</script>';
				echo '<script>location.href="'.INCLUDE_PATH.'admin"</script>';
				die();
			}else if(isset($_POST['awnser_interaction'])){
				\Models\AdminModel::updatePost($_POST);
				\Models\AdminModel::insertPost($_POST);
				\Models\AdminModel::sendMail($_POST);
			}
			\Views\MainView::render('admin/new-calls',$info);
			$calls = \Models\AdminModel::getCalls('ORDER BY `id` DESC');
			foreach($calls as $key => $value){
				$check = \Models\AdminModel::getInteractions(' WHERE `call_id` = ?',[$value['token']],false);
				if($check->rowCount() >= 1)
					continue;
				\Views\MainView::render('admin/form-awnser',$value);
			}
			\Views\MainView::render('admin/last-interations',$info);
			$calls = \Models\AdminModel::getInteractions(' WHERE `admin` = ? AND `status` = ? ORDER BY `id` DESC',[-1,0],false);
			$calls = $calls->fetchAll();
			foreach($calls as $key => $value){
				$call = \Models\AdminModel::getCalls(' WHERE token = ?',[$value['call_id']])[0]['email'];
				$value['email'] = $call;
				\Views\MainView::render('admin/form-interactions',$value);
			}
		}
	}
?>