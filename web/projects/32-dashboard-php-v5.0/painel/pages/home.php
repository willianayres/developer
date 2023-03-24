<?php
	$usersOn = Site::listUsersOn(); 
	$all = Painel::getData('tb_admin.visits','*','',array(),false,false);
	$all = $all->rowCount();
	$today = Painel::getData('tb_admin.visits','*',' WHERE day = ?',array(date('Y-m-d')),false,false);
	$today = $today->rowCount();
?>
<div class="box w100">
	<h2><i class="fas fa-server"></i> Painel de Controle - <?php echo COMPANY_NAME;?></h2>
	<div class="metrics">
		<div class="metric left">
			<div class="wraper">
				<h2>Usuários Online</h2>
				<p><?php echo count($usersOn);?></p>
			</div><!--wraper-->
		</div><!--metric-->
		<div class="metric left">
			<div class="wraper">
				<h2>Total de Visitas</h2>
				<p><?php echo $all;?></p>
			</div><!--wraper-->
		</div><!--metric-->
		<div class="metric left">
			<div class="wraper">
				<h2>Visitas Hoje</h2>
				<p><?php echo $today;?></p>
			</div><!--wraper-->
		</div><!--metric-->
		<div class="clear"></div><!--clear-->
	</div><!--metrics-->
</div><!--box-->

<div class="box w100 left">
	<h2><i class="far fa-eye"></i></i> Usuários Online no Site</h2>
	<div class="table">
		<div class="row">
			<div class="col w50 left">
				<span>IP</span>
			</div><!--col-->
			<div class="col w50 left">
				<span>Última Vizualização</span>
			</div><!--col-->
			<div class="clear"></div><!--clear-->
		</div><!--row-->
		<?php foreach($usersOn as $key => $value){ ?>
		<div class="row">
			<div class="col w50 left">
				<span><?php echo $value['ip'];?></span>
			</div><!--col-->
			<div class="col w50 left">
				<span><?php echo date('d/m/Y H:i:s', strtotime($value['last_action']));?></span>
			</div><!--col-->
			<div class="clear"></div><!--clear-->
		</div><!--row-->
		<?php } ?>
	</div><!--table-->
</div><!--box-->

<div class="box w100 left">
	<h2><i class="fas fa-chalkboard-teacher"></i></i> Usuários do Painel</h2>
	<div class="table">
		<div class="row">
			<div class="col w50 left">
				<span>Nome</span>
			</div><!--col-->
			<div class="col w50 left">
				<span>Cargo</span>
			</div><!--col-->
			<div class="clear"></div><!--clear-->
		</div><!--row-->
		<?php
			$usersPainel = Painel::getData('tb_admin.users','*','',array(),true,true);
			foreach($usersPainel as $key => $value){ 
		?>
		<div class="row">
			<div class="col w50 left">
				<span><?php echo $value['user'];?></span>
			</div><!--col-->
			<div class="col w50 left">
				<span><?php echo Painel::getOffice($value['office']);?></span>
			</div><!--col-->
			<div class="clear"></div><!--clear-->
		</div><!--row-->
		<?php } ?>
	</div><!--table-->
</div><!--box-->

