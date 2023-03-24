<?php
	include('../config.php');
	if(!Painel::logged()){
		die("Você não está logado!");
	}
?>
<style>
	*{
		box-sizing: border-box;
		margin: 0;
		padding: 0;
	}

	.container{
		margin: 0 auto;
		width: 900px;
	}
	table{
		border-collapse: collapse;
		padding: 10px 5px;
		width: 100%;
	}
	table td{
		border: 1px solid #CCC;
		font-size: 12px;
	}
	table tr th{
		background-color: #333;
		border: 1px solid #CCC;
		color: #FFF;
		font-size: 16px;
		text-align: center;
	}
	table th{
		text-align: left;
	}
</style>
<section class="pdf-generator">
	<div class="container">
		<?php $name = isset($_GET['pay']) && $_GET['pay'] == 'pay' ? 'Concluídos' : 'Pendentes';?>
		<table>
			<tr><th colspan="4">Pagamentos <?php echo $name;?></th></tr>
			<tr>
				<td><b>Pagamento</b></td>
				<td><b>Cliente</b></td>
				<td><b>Valor</b></td>
				<td><b>Vencimento</b></td>
			</tr>
			<?php
				$status = 0;
				if($name == 'Concluídos')
					$status = 1;
				$payments = Painel::getData('tb_admin.payments','*',' WHERE status = ? ORDER BY due ASC',array($status),true,true);
				foreach($payments as $key => $value){
					$client = Painel::getData('tb_admin.clients','name',' WHERE id = ?',array($value['client_id']))['name'];
			?>
				<tr>
					<td><?php echo $value['name'];?></td>
					<td><?php echo $client;?></td>
					<td><?php echo 'R$ '.str_replace('.',',',$value['value']);?></td>
					<td><?php echo date('d/m/Y',strtotime($value['due']));?></td>
				</tr>
			<?php } ?>
		</table>
	</div><!--container-->
</section><!--pdf-generator-->