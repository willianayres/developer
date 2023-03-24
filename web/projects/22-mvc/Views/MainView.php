<?php

	namespace Views;

	class MainView{
		
		private $header;
		private $file;
		private $footer;

		const title = 'Projeto MVC';

		public $nav = array('Home','Sobre','Contato');

		public function __construct($file,$header = 'header',$footer = 'footer'){
			$this->header = $header;
			$this->file   = $file;
			$this->footer = $footer;
		}

		public function render($arr = []){
			include('pages/templates/'.$this->header.'.php');
			include('pages/'.$this->file.'.php');
			include('pages/templates/'.$this->footer.'.php');
		}

	}

?>