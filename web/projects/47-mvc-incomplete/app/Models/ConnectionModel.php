<?php
	namespace App\Models;
	
	class ConnectionModel
	{

		private static $pdo;

		public function connect(){
			if(self::$pdo == null){
				try{
				self::$pdo = new \PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD,array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
				self::$pdo->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
				}catch(\PDOException $error){
					return $error->getMessage();
				}
			}
			return self::$pdo;
		}
	}
?>