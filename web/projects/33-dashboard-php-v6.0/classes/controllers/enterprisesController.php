<?php
	namespace controllers;

	class enterprisesController
	{
		public function index($par){
			$enterprise_id = \Painel::getData('tb_admin.enterprises','id,name',' WHERE slug = ?',array($par[1]),true);
			\views\mainView::setParameter(['name_enterprise'=>$enterprise_id['name'],'slug_enterprise'=>$par[1],'buildings'=>\models\enterprisesModel::getBuildings($enterprise_id['id'])]);
			\views\mainView::render('enterprises.php');
		}
	}
?>