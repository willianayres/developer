<?php

	namespace Controllers;

	class SobreController extends Controller{

		public function __construct(){
			$this->view = new \Views\MainView('sobre');
		}

		public function execute(){
			$this->view->render(array('title'=>'Sobre'));
		}

	}

?>