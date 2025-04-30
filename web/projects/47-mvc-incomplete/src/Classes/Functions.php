<?php
	namespace Src\Classes;
	
	class Functions
	{
		public static function alert($msg){
			echo '<script>alert("'.$msg.'");</script>';
		}

		public static function redirect($url){
			echo '<script>window.location.href="'.$url.'"</script>';
			die();
		}
	}
?>