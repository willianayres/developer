<?php 
	namespace models;

	class enterprisesModel
	{
		public static function getBuildings($id){
			$buildings = \Painel::getData('tb_admin.buildings','*',' WHERE enterprise_id = ?',array($id),true,true);
			return $buildings;
		}
	}
?>