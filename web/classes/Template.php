<?php

	class Template{
		
		public function render($arr,$filename){
			$file = file_get_contents('arquivos/'.$filename);
			foreach ($arr as $key => $value) {
				$file = str_replace('{'.$key.'}',$value,$file);
			}
			echo $file;
		}

	}
?>