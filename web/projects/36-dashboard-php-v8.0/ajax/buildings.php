<?php
	// Include the main config file.
	include('../config.php');
	// Variables.
	$data = '';

	if(isset($_POST['slug_enterprise'])){
		// Especific page.
		$area_min = $_POST['area_min'];
		$area_max = $_POST['area_max'];
		$price_min = \Painel::moneySubmit($_POST['price_min']);
		$price_max = \Painel::moneySubmit($_POST['price_max']);
		$slug_enterprise = $_POST['slug_enterprise'];
		$name_building = $_POST['name_building'];
		$name_enterprise = \Painel::getData('tb_admin.enterprises','id,name',' WHERE slug = ?', array($slug_enterprise),true);

		if($area_min === '')
			$area_min = 0;
		if($area_max === '')
			$area_max = 1000000000;
		if($price_min === '')
			$price_min = 0;
		if($price_max === '')
			$price_max = 1000000000;

		//$buildings = \Painel::getData('tb_admin.buildings','`tb_admin.buildings`.*, `tb_admin.enterprises`.`name` as name_enterprise',' INNER JOIN `tb_admin.enterprises` ON `tb_admin.enterprises`.`id` = `tb_admin.buildings`.`enterprise_id` WHERE `tb_admin.buildings`.`price` >= ? AND `tb_admin.buildings`.`price` <= ? AND `tb_admin.buildings`.`area` >= ? AND `tb_admin.buildings`.`area` <= ? AND `tb_admin.buildings`.name LIKE ? AND `tb_admin.enterprises`.slug = ?',array($price_min,$price_max,$area_min,$area_max,"%$name_building%",$slug_enterprise),true,true);
		$buildings = \Painel::getData('tb_admin.buildings','*',' WHERE price >= ? AND price <= ? AND area >= ? AND area <= ? AND name LIKE ? AND enterprise_id = ?',array($price_min,$price_max,$area_min,$area_max,"%$name_building%",$name_enterprise['id']),true,true);
		$data .= '<h2 class="title-search">Listando <strong>'.count($buildings).' imóvel(is)</strong> em <strong>'.$name_enterprise['name'].'</strong></h2>';
		foreach($buildings as $key => $value){
			$building_img = \Painel::getData('tb_admin.buildings-images','img',' WHERE building_id = ?',array($value['id']),true)['img'];
			$data .= '<div class="row-buildings">
						<div class="row1">
							<img alt="" src="'.IMAGES.'/buildings/'.$building_img.'" />
						</div><!--row1-->
						<div class="row2">
							<p><i class="fas fa-signature"></i> Nome do Imóvel: '.$value['name'].'</p>
							<p><i class="far fa-calendar-minus"></i> Preço do Imóvel: R$ '. \Painel::money($value['price']).'</p>
							<p><i class="fas fa-ruler-combined"></i> Área do Imóvel: '.$value['area'].' m²</p>
						</div><!--row2-->
					</div><!--row-buildings-->';
		}
	}else{
		// Show all.
		$area_min = $_POST['area_min'];
		$area_max = $_POST['area_max'];
		$price_min = \Painel::moneySubmit($_POST['price_min']);
		$price_max = \Painel::moneySubmit($_POST['price_max']);
		$name_building = $_POST['name_building'];

		if($area_min === '')
			$area_min = 0;
		if($area_max === '')
			$area_max = 1000000000;
		if($price_min === '')
			$price_min = 0;
		if($price_max === '')
			$price_max = 1000000000;

		$buildings = \Painel::getData('tb_admin.buildings','`tb_admin.buildings`.*','  WHERE `tb_admin.buildings`.`price` >= ? AND `tb_admin.buildings`.`price` <= ? AND `tb_admin.buildings`.`area` >= ? AND `tb_admin.buildings`.`area` <= ? AND `tb_admin.buildings`.name LIKE ?',array($price_min,$price_max,$area_min,$area_max,"%$name_building%"),true,true);
		$data .= '<h2 class="title-search">Listando <strong>'.count($buildings).' imóveis</strong></h2>';
		foreach($buildings as $key => $value){
			$building_img = \Painel::getData('tb_admin.buildings-images','img',' WHERE building_id = ?',array($value['id']),true)['img'];
			$data .= '<div class="row-buildings">
						<div class="row1">
							<img alt="" src="'.IMAGES.'/buildings/'.$building_img.'" />
						</div><!--row1-->
						<div class="row2">
							<p><i class="fas fa-signature"></i> Nome do Imóvel: '.$value['name'].'</p>
							<p><i class="far fa-calendar-minus"></i> Preço do Imóvel: R$ '. \Painel::money($value['price']).'</p>
							<p><i class="fas fa-ruler-combined"></i> Área do Imóvel: '.$value['area'].' m²</p>
						</div><!--row2-->
					</div><!--row-buildings-->';
		}
	}
	echo $data;
?>