<?php
	namespace Models;
	class LoginModel extends Model{
		public $login = 'admin';
		public $password = 'admin';

		public function loginValidation($login,$password){
			return ($login == $this->login && $password == $this->password);
		}
	}
?>