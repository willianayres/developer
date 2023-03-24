<?php
	namespace Views;

	class View{

		const DEFAULT_HEADER = 'header.php';
		const DEFAULT_FOOTER = 'footer.php';

		public function render($body, $header = null, $footer = null){
			if($header == null){
				include(BASE_DIR.'/classes/views/templates/'.self::DEFAULT_HEADER);
			}
			include(BASE_DIR.'/classes/views/templates/'.$body);
			if($footer == null){
				include(BASE_DIR.'/classes/views/templates/'.self::DEFAULT_FOOTER);
			}
		}
	}
?>