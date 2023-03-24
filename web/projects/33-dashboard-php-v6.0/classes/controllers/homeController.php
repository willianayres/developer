<?php
	namespace controllers;

	class homeController
	{
		public function index(){
			\views\mainView::setParameter(['buildings'=>\models\homeModel::getBuildings()]);
			\views\mainView::render('home.php');
		}
	}
?>