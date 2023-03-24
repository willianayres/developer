<?php
	class File
	{
		public static function validImg($img, $size = 1000, $gif = false){
			if(!$gif){
				if($img['type'] == 'image/jpeg' || $img['type'] == 'image/jpg' || $img['type'] == 'image/png')
					return (intval($img['size'] / 1024) < $size);
			}else{
				if($img['type'] == 'image/gif')
					return (intval($img['size'] / 1024) < $size);
			}
			return false;
		}
		public static function uploadFile($file, $type = ''){
			$file_format = explode('.', $file['name']);
			$file_name = uniqid().'.'.$file_format[count($file_format) - 1];
			if(move_uploaded_file($file['tmp_name'], BASE_DIR_PAINEL.'/uploads/'.$type.'/'.$file_name)){
				return $file_name;
			}else{
				return false;
			}
		}
		public static function deleteFile($file, $type = ''){
			@unlink(BASE_DIR_PAINEL.'\uploads\\'.$type.$file);
		}
	}
?>