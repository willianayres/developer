<?php
	namespace App\Models;

	use \App\Models\ConnectionModel;

	class CadastroModel extends ConnectionModel
	{
		private $db;

		protected function registerClients($name,$sex,$city){
			$id = 0;
			$this->db = $this->connect()->prepare("INSERT INTO `teste` VALUES(:id,:name,:sex,:city)");
			$this->db->bindParam(":id",$id,\PDO::PARAM_INT);
			$this->db->bindParam(":name",$name,\PDO::PARAM_STR);
			$this->db->bindParam(":sex",$sex,\PDO::PARAM_STR);
			$this->db->bindParam(":city",$city,\PDO::PARAM_STR);
			$this->db->execute();
		}

		protected function selectClients($name,$sex,$city){
			$name = '%'.$name.'%';
			$sex = '%'.$sex.'%';
			$city = '%'.$city.'%';
			$b_fetch = $this->connect()->prepare("SELECT * FROM `teste` WHERE `name` LIKE :name AND `sex` LIKE :sex AND `city` LIKE :city");
			$b_fetch->bindParam(":name",$name,\PDO::PARAM_STR);
			$b_fetch->bindParam(":sex",$sex,\PDO::PARAM_STR);
			$b_fetch->bindParam(":city",$city,\PDO::PARAM_STR);
			$b_fetch->execute();
			$array = [];
			$i = 0;
			while($fetch = $b_fetch->fetch(\PDO::FETCH_ASSOC)){
				$array[$i] = ['id'=>$fetch['id'],'Nome'=>$fetch['name'],'Sexo'=>$fetch['sex'],'Cidade'=>$fetch['city']];
				$i++;
			}
			return $array;
		}

		protected function deleteClients($id){
			$b = $this->connect()->prepare("DELETE FROM `teste` WHERE `id` = :id");
			$b->bindParam(":id",$id,\PDO::PARAM_INT);
			$b->execute();
		}

	}
?>