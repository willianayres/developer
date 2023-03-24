<?php
	namespace Classes;
	class Functions
	{
		public static function alert($msg){
			echo '<script>alert("'.$msg.'");</script>';
		}
		public static function redirect($url){
			//header('Location: '.$url);
			echo '<script>window.location.href="'.$url.'"</script>';
			die();
		}
	}
?>