<?php

	namespace Controllers;

	class ContatoController extends Controller{

		public function execute(){
			if(isset($_POST['action'])){
				\Models\ContatoModel::sendForm();
				echo '<script>location.href="'.INCLUDE_PATH.'contato/sucesso";</script>';
				die();
			}
			\Router::route('contato/?',function(){
				$this->view = new \Views\MainView('contato-sucesso');
				$this->view->render(array('title'=>'Contato'));
			});

			\Router::route('contato',function(){
				$this->view = new \Views\MainView('contato');
				$this->view->render(array('title'=>'Contato'));
			});
		}
	}
?>