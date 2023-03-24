<?php
	if(isset($_GET['id'])){
		$id    = (int)$_GET['id'];
		$client = Painel::getData('tb_admin.clients','*','WHERE id = ?',array($id));
	}else{
		Painel::alert('error', 'Você precisa passar o parâmetro ID!');
		die();
	}
	$cur_pay_page = isset($_GET['pay_page']) ? (int)$_GET['pay_page'] : 1;
	$cur_pendent_page = isset($_GET['pendent_page']) ? (int)$_GET['pendent_page'] : 1;
	$per_page = PER_PAGE;
?>
<div class="box">

	<h2><i class="far fa-file-image"></i> Editar Cliente</h2>
	<form action="<?php pathPainel();?>ajax/forms.php" class="ajax" method="post" enctype="multipart/form-data">
		
		<div class="group">
			<label>Nome:</label>
			<input type="text" name="name" value="<?php echo $client['name'];?>" />
		</div><!--group-->

		<div class="group">
			<label>E-mail:</label>
			<input type="text" name="email" value="<?php echo $client['email'];?>" />
		</div><!--group-->

		<div class="group">
			<label>Tipo:</label>
			<select name="client_type">
				<option <?php if($client['client_type'] == 'physical') echo 'selected';?> value="physical">Físico</option>
				<option <?php if($client['client_type'] == 'legal') echo 'selected';?> value="legal">Jurídico</option>
			</select>
		</div><!--group-->

		<div class="group" ref="cpf">
			<label>CPF:</label>
			<input type="text" name="cpf" value="<?php echo ($client['client_type'] == 'physical') ? $client['number'] : '';?>" />
		</div><!--group-->

		<div class="group" ref="cnpj" style="display:none;">
			<label>CNPJ:</label>
			<input type="text" name="cnpj" value="<?php echo ($client['client_type'] == 'legal') ? $client['number'] : '';?>" />
		</div><!--group-->

		<div class="group">
			<label>Imagem:</label>
			<input type="file" name="img" />
			<input type="hidden" name="cur_img" value="<?php echo $client['img'];?>" />
		</div><!--group-->

		<div class="group">
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="hidden" name="action_type" value="update" />
			<input type="submit" name="action" value="Atualizar" />
		</div><!--group-->

	</form>

	<h2><i class="fas fa-cash-register"></i> Adicionar Pagamentos</h2>

	<?php 
		if(isset($_POST['payment_action'])){
			$client_id = $id;
			$payment_name = $_POST['payment_name'];
			if($_POST['payment_value'] == ''){
				$payment_value = '0.00';
			}else{
				$payment_value = str_replace('.','',$_POST['payment_value']);
				$payment_value = str_replace(',','.',$payment_value);
				$payment_value = str_replace('R$ ','',$payment_value);
			}
			$parcels = $_POST['payment_parcels'];
			$interval = $_POST['payment_interval'];
			$initial_due = $_POST['payment_due'];
			$status = 0;
			$check = true;

			if($payment_name == '' || $value = '' || $parcels == '' || $interval == '' || $initial_due == ''){
				Painel::alert('error','Campos vazios não são permitidos');
			}else{
				if(strtotime($initial_due) < strtotime(date('Y-m-d'))){
					Painel::alert('error','A data de vencimento é menor do que a data atual!');
				}else{
					for($i=0; $i<$parcels; $i++){
						$due = strtotime($initial_due) + (($i * $interval) * (60*60*24));	
						$sql = Painel::insertData(array('table'=>'tb_admin.payments','client_id'=>$client_id,'name'=>$payment_name,'value'=>$payment_value,'due'=>date('Y-m-d',$due),'status'=>0), false);
						if(!$sql){
							$check = false;
							break;
						}
					}
					if($check){
						Painel::alert('success', 'O pagamento foi inserido com sucesso!');
					}else{
						Painel::alert('error', 'Ocorreu um erro ao inserir pagamento no banco de dados!');
					}
				}
			}
		}
	?>

	<form method="post">

		<div class="group">
			<label>Nome do Pagamento:</label>
			<input type="text" name="payment_name" value="" />
		</div><!--group-->

		<div class="group">
			<label>Valor do Pagamento:</label>
			<input type="text" name="payment_value" value="" />
		</div><!--group-->

		<div class="group">
			<label>Número de Parcelas:</label>
			<input type="text" name="payment_parcels" value="" />
		</div><!--group-->

		<div class="group">
			<label>Intervalo:</label>
			<input type="text" name="payment_interval" value="" />
		</div><!--group-->
		
		<div class="group">
			<label>Vencimento:</label>
			<input type="text" name="payment_due" value="" />
		</div><!--group-->

		<div class="group">
			<input type="submit" name="payment_action" value="Inserir Pagamento" />
		</div><!--group-->

	</form>

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
				$pending_payments = Painel::getData('tb_admin.payments','*',' WHERE status = ? AND client_id = ? ORDER BY due ASC LIMIT '.($cur_pendent_page - 1) * $per_page.','.$per_page,array(0,$id),true,true);
				foreach($pending_payments as $key => $value){
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
					<td class="center"><a class="edit" href="<?php pathPainel(); ?>edit-client?id=<?php echo $id?>&pendent_page=<?php echo $cur_pendent_page;?>&pay_page=<?php echo $cur_pay_page;?>&email=<?php echo $client['id'];?>&parcel=<?php echo $value['id'];?>"><i class="fas fa-envelope"></i> E-mail</a></td>
					<td class="center"><a class="pay" href="<?php pathPainel(); ?>edit-client?id=<?php echo $id?>&pendent_page=<?php echo $cur_pendent_page;?>&pay_page=<?php echo $cur_pay_page;?>&pay=<?php echo $value['id'];?>"><i class="fas fa-credit-card"></i></i> Pago</a></td>

				</tr>

			<?php } ?>

		</table>
	</div><!--wraper-table-->

	<div class="pagination">
		<?php
			// Total pages is definid by ceiling the number of elementes on the table divided
			// by the number that you want to have showed per page.
			$tot_pages = ceil(count(Painel::getData('tb_admin.payments', '*',' WHERE status = ? AND client_id = ?', array(0,$id), true, true)) / $per_page);
			for($i = 1; $i <= $tot_pages; $i++){
				if($i == $cur_pendent_page)
					echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'edit-client?id='.$id.'&pendent_page='.$i.'&pay_page='.$cur_pay_page.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'edit-client?id='.$id.'&pendent_page='.$i.'&pay_page='.$cur_pay_page.'">'.$i.'</a>';
			}
		?>
	</div><!--pagination-->

	<h2><i class="far fa-list-alt"></i> Pagamentos Concluídos</h2>

	<div class="wraper-table">
		<table>
			<tr>
				<td><i class="fas fa-signature"></i> Nome do Pagamento</td>
				<td><i class="fas fa-user"></i> Cliente</td>
				<td><i class="fas fa-dollar-sign"></i> Valor</td>
				<td><i class="far fa-calendar-alt"></i> Vencimento</td>
			</tr>

			<?php

				$pay_payments = Painel::getData('tb_admin.payments','*',' WHERE status = ? AND client_id = ? ORDER BY due ASC LIMIT '.($cur_pay_page - 1) * $per_page.','.$per_page,array(1,$id),true,true);
				foreach($pay_payments as $key => $value){
			?>

				<tr>
					<td><?php echo $value['name'];?></td>
					<td><?php echo $client['name'];?></td>
					<td><?php echo 'R$ '.str_replace('.',',',$value['value']);?></td>
					<td><?php echo date('d/m/Y',strtotime($value['due']));?></td>
				</tr>

			<?php } ?>

		</table>
	</div><!--wraper-table-->

	<div class="pagination">
		<?php
		/*
			// Total pages is definid by ceiling the number of elementes on the table divided
			// by the number that you want to have showed per page.
			$tot_pages = ceil(count(Painel::getData('tb_admin.payments', '*', ' WHERE status = ? AND client_id = ?', array(1,$id), true, true)) / $per_page);
			for($i = 1; $i <= $tot_pages; $i++){
				if($i == $cur_page)
					echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'edit-client?id='.$id.'&page='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'edit-client?id='.$id.'&page='.$i.'">'.$i.'</a>';
			}
		*/
		?>
	</div><!--pagination-->

	<div class="pagination">
		<?php
			// Total pages is definid by ceiling the number of elementes on the table divided
			// by the number that you want to have showed per page.
			$tot_pages = ceil(count(Painel::getData('tb_admin.payments', '*',' WHERE status = ? AND client_id = ?', array(1,$id), true, true)) / $per_page);
			for($i = 1; $i <= $tot_pages; $i++){
				if($i == $cur_pay_page)
					echo '<a class="sel" href="'.INCLUDE_PATH_PAINEL.'edit-client?id='.$id.'pendent_page='.$cur_pendent_page.'&pay_page='.$i.'">'.$i.'</a>';
				else
					echo '<a href="'.INCLUDE_PATH_PAINEL.'edit-client?id='.$id.'pendent_page='.$cur_pendent_page.'&pay_page='.$i.'">'.$i.'</a>';
			}
		?>
	</div><!--pagination-->

</div><!--box-->