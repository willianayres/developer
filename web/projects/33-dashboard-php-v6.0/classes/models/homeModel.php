<?php 
	namespace models;

	class homeModel
	{
		public static function getBuildings(){
			$buildings = \Painel::getData('tb_admin.buildings','*','',[],true,true);
			return $buildings;
		}
	}
?>