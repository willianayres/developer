<?php

	namespace views;

	class mainView
	{

		public static $par = [];

		public static function setParameter($par){
			self::$par = $par;
		}

		public static function render($file, $header = 'pages/includes/header.php', $footer = 'pages/includes/footer.php'){
			include($header);
			include('pages/'.$file);
			include($footer);
			die();
		}
	}
?>