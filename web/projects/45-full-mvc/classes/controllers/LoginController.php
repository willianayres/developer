<?php
	namespace Controllers;
	class LoginController extends Controller{

		public function __construct($view,$model){
			parent::__construct($view,$model);
		}

		public function index(){
			if(isset($_POST['login_user'])){
				if($this->model->loginValidation($_POST['login'],$_POST['password'])){
					die('Logado com sucesso!');
				}else{
					die('Login ou senha inválido!');
				}
			}
			$this->view->render('login.php');
		}

	}
?>