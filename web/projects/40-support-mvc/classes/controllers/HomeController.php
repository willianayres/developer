<?php
	namespace Controllers;

	class HomeController{

		public static function index(){
			if(isset($_POST['call'])){
				$info = \Models\HomeModel::insertPost($_POST);
				\Models\HomeModel::sendMail($info);
				echo '<script>alert("Seu chamado foi aberto com sucesso! Você receberá no e-mail as informações para interagir!");</script>';
			}
			\Views\MainView::render('home');
		}
	}
?>