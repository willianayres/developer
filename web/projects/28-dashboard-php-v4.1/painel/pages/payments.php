<?php
	$cur_pay_page = isset($_GET['pay_page']) ? (int)$_GET['pay_page'] : 1;
	$cur_pendent_page = isset($_GET['pendent_page']) ? (int)$_GET['pendent_page'] : 1;
	$per_page = PER_PAGE;
?>
<div class="box">

	<?php
		if(isset($_GET['pay'])){
			if(Painel::updateData(array('table'=>'tb_admin.payments','id'=>$_GET['pay'],'status'=>1))){
				Painel::alert('success','O pagamento foi quitado com sucesso!');
			}else{
				Painel::alert('error','Ocorreu um erro na hora de concluir o pagamento!');
			}
		}

		if(isset($_GET['email'])){
			$parcel_id = (int)$_GET['parcel'];
			$client_id = (int)$_GET['email'];
			if(isset($_COOKIE['client_'.$client_id])){
				// Block emailing span.
				Painel::alert('error','Você já enviou um e-mail cobrando desse cliente! Aguarde mais um pouco...');
			}else{
				// Cookie setting to block span.
				$info_payment = Painel::getData('tb_admin.payments','*',' WHERE id = ?',array($parcel_id));
				$info_client = Painel::getData('tb_admin.clients','*',' WHERE id = ?',array($client_id));
				$body = 'Olá '.$info_client['name'].' você está com um saldo pendente de '.$info_payment['value'].' com o vencimento para '.date('d/m/Y',strtotime($info_payment['due'])).'. Entre em contato conosco para quitar sua parcela!';

				// Set a new Email object with the right parameters.
				$mail = new Email('ssl://smtp.gmail.com','will.joris@gmail.com','KLEB%RT~Jm8hE+@%','Willian');
				$mail->addAddres($info_client['email'],$info_client['name']);
				$mail->formatMail(array('subject' => 'Parcela próxima de vencimento!', 'body' => $body));
				// Check if the e-mail was sent to set the data.
				$mail->sendMail();

				Painel::alert('success','E-mail enviado com sucesso!');
				setcookie('client_'.$client_id,'true',time()+(60*60*24*7),'/');
			}
		}
	?>

	<h2><i class="far fa-list-alt"></i> Pagamentos Pendentes</h2>

	<div class="pdf">
		<a class="" href="<?php pathPainel();?>pdf-generator.php?pay=pendents" target="_blank"><i class="far fa-file-pdf"></i> Gerar PDF</a>
	</div><!--pdf-->

	<div class="wraper-table">
		<table>
			<tr>
				<td><i class="fas fa-signature"></i> Nome do Pagamento</td>
				<td><i class="fas fa-user"></i> Cliente</td>
				<td><i class="fas fa-dollar-sign"></i> Valor</td>
				<td><i class="far fa-calendar-alt"></i> Vencimento</td>
				<td class="center"><i class="fas fa-envelope"></i> Enviar por E-mail</td>
				<td class="center"><i class="fas fa-credit-card"></i> Marcar como Pago</td>
			</tr>
			<?php
				$pending_payments = Painel::getData('tb_admin.payments','*',' WHERE status = ? ORDER BY due ASC LIMIT '.($cur_pendent_page - 1) * $per_page.','.$per_page,array(0),true,true);
				foreach($pending_payments as $key => $value){
					$client = Painel::getData('tb_admin.clients','name , id','WHERE id = ?',array($value['client_id']));
					$style = '';
					if(strtotime(date('Y-m-d')) >= strtotime($value['due'])){
						$style = 'style = "background-color: #FF7070; font-weight: 700;"';
					}
			?>

				<tr <?php echo $style;?>>
					<td><?php echo $value['name'];?></td>
					<td><?php echo $client['name'];?></td>
					<td><?php echo 'R$ '.str_replace('.',',',$value['value']);?></td>
					<td><?php echo date('d/m/Y',strtotime($value['due']));?></td>
					<td class="center"><a class="edit" href="<?php pathPainel(); ?>payments?pendent_page=<?php echo $cur_pendent_page;?>&pay_page=<?php echo $cur_pay_page;?>&email=<?php echo $client['id'];?>&parcel=<?php echo $value['id'];?>"><i class="fas fa-envelope"></i> E-mail</a></td>
					<td class="center"><a class="pay" href="<?php pathPainel(); ?>payments?pendent_page=<?php echo $cur_pendent_page;?>&pay_page=<?php echo $cur_pay_page;?>&pay=<?php echo $value['id'];?>"><i class="fas fa-credit-card"></i></i> Pago</a></td>
				</tr>

			<?php } ?>
		</table>
	</div><!--wraper-table-->

	<div class="pagination">
		<?php
			// Total pages is definid by ceiling the number of elementes on the table divided
			// by the number that you want to have showed per page.
			$tot_pages = ceil(count(Painel::getData('tb_admin.payments', '*',' WHERE status = ?', array(0), true, true)) / $per_page);
			for($i = 1; $i <= $tot_pages; $i++){
				if($i == $cur_pendent_page)
					echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'payments?pendent_page='.$i.'&pay_page='.$cur_pay_page.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'payments?pendent_page='.$i.'&pay_page='.$cur_pay_page.'">'.$i.'</a>';
			}
		?>
	</div><!--pagination-->

	<h2><i class="far fa-list-alt"></i> Pagamentos Concluídos</h2>

	<div class="pdf">
		<a class="" href="<?php pathPainel();?>pdf-generator.php?pay=pay" target="_blank"><i class="far fa-file-pdf"></i> Gerar PDF</a>
	</div><!--pdf-->

	<div class="wraper-table">
		<table>
			<tr>
				<td><i class="fas fa-signature"></i> Nome do Pagamento</td>
				<td><i class="fas fa-user"></i> Cliente</td>
				<td><i class="fas fa-dollar-sign"></i> Valor</td>
				<td><i class="far fa-calendar-alt"></i> Vencimento</td>
			</tr>
			<?php
				$pay_payments = Painel::getData('tb_admin.payments', '*',' WHERE status = ? ORDER BY due ASC LIMIT '.($cur_pay_page - 1) * $per_page.','.$per_page,array(1),true,true);
				foreach($pay_payments as $key => $value){
					$client = Painel::getData('tb_admin.clients','name','WHERE id = ?',array($value['client_id']))['name'];
			?>

				<tr>
					<td><?php echo $value['name'];?></td>
					<td><?php echo $client;?></td>
					<td><?php echo 'R$ '.str_replace('.',',',$value['value']);?></td>
					<td><?php echo date('d/m/Y',strtotime($value['due']));?></td>
				</tr>

			<?php } ?>
		</table>
	</div><!--wraper-table-->

	<div class="pagination">
		<?php
			// Total pages is definid by ceiling the number of elementes on the table divided
			// by the number that you want to have showed per page.
			$tot_pages = ceil(count(Painel::getData('tb_admin.payments', '*',' WHERE status = ?', array(1), true, true)) / $per_page);
			for($i = 1; $i <= $tot_pages; $i++){
				if($i == $cur_pay_page)
					echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'payments?pendent_page='.$cur_pendent_page.'&pay_page='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'payments?pendent_page='.$cur_pendent_page.'&pay_page='.$i.'">'.$i.'</a>';
			}
		?>
	</div><!--pagination-->

</div><!--box-->