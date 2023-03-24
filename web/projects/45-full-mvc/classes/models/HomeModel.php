<?php
	namespace Models;
	class HomeModel extends Model{
		public static function getClients(){
			$clients = \MySQL::connect()->prepare('SELECT * FROM `clients`');
			$clients->execute();
			return 	$clients->fetchAll();
		}
	}
?>