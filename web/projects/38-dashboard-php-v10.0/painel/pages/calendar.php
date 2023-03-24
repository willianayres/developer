<?php 
	$month = isset($_GET['month']) ? (int)$_GET['month'] : date('m',time());
	$year = isset($_GET['year']) ? (int)$_GET['year'] : date('Y',time());

	$next_year = $prev_year = $year;
	$next_month = $prev_month = $month;

	if($month+1 == 13){
		$next_year = $year+1;
		$next_month = 1;
	}
	if($month-1 == 0){
		$prev_year = $year-1;
		$prev_month = 12;
	}

	if($next_month < 10)
		$next_month = str_pad($next_month,strlen($next_month)+1,"0",STR_PAD_LEFT);

	$next_month_date = "$next_year-$next_month-01";
	$prev_month_date = "$prev_year-$prev_month-31";

	if($month <= 0 || $month > 12){
		\Painel::alert('error','Você está tentando acessar um mês que não existe!');
		die();
	}
	if($year < explode('-',MAX_TIME[0])[0] && $year > explode('-',MAX_TIME[0])[1]){
		\Painel::alert('error','Você está tentando acessar um mês que não existe!');
		die();
	}
	if(($year == explode('-',MAX_TIME[0])[0] && $month < explode('-',MAX_TIME[1])[0]) && ($year == explode('-',MAX_TIME[0])[1]) && $month >  explode('-',MAX_TIME[1])[1]){
		\Painel::alert('error','Você está tentando acessar um mês que não existe!');
		die();
	}

	$months = array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');	

	$today = date('d',time());
	$today = "$year-$month-$today";

	$days_number = cal_days_in_month(CAL_GREGORIAN,$month,$year);
	$day_start = date('N',strtotime("$year-$month-01"));

?>
<div class="box">
	<h2><i class="fas fa-calendar"></i> Calendário e Agenda | <u><?php echo $months[(int)$month-1].'/'.$year; ?></u></h2>
	<div class="calendar-buttons">
		<?php if(!(strtotime($prev_month_date) < strtotime(MAX_TIME[0]))){  ?>
		<a href="
		<?php
			pathPainel();
			echo 'calendar?month=';
			echo ($month - 1 == 0) ? 12 : $month-1;
			echo '&year=';
			echo $prev_year;
		?>"><i class="fas fa-angle-double-left"></i></a>
		<?php }else{?>
			<p><i class="fas fa-angle-double-left"></i></p>
		<?php 
			}
			if(!(strtotime($next_month_date) > strtotime(MAX_TIME[1]))){ 
		?>
		<a href="
		<?php
			pathPainel();
			echo 'calendar?month=';
			echo ($month + 1 > 12) ? 1 : $month+1;
			echo '&year=';
			echo $next_year;
		?>"><i class="fas fa-angle-double-right"></i></a>
		<?php }else{ ?>
			<p><i class="fas fa-angle-double-right"></i></p>
		<?php } ?>
	</div><!--calendar-buttons-->
	<div class="calendar-wraper">
		<table class="calendar">
			<tr>
				<td>Domingo</td>
				<td>Segunda</td>
				<td>Terça</td>
				<td>Quarta</td>
				<td>Quinta</td>
				<td>Sexta</td>
				<td>Sábado</td>
			</tr>
			<?php
				$n = 1;
				$z = 0;
				$days_number += $day_start;
				$t = 0;
				while($n <= $days_number){
					if($day_start == 7 && $z != $day_start){
						$z = 7;
						$n = 8;
					}
					// Inicia uma linha.
					if($n % 7 == 1){
						echo '<tr>';
					}
					if($z >= $day_start){
						$day = $n - $day_start;
						if($day < 10){
							// Adiciona um 0 na frente do número caso ele seja menor do que 10.
							$day = str_pad($day,strlen($day)+1,"0",STR_PAD_LEFT);
						}
						// Se for o hoje, coloca a classe selecionado.
						$day_today = "$year-$month-$day";
						if($day_today != $today){
							echo '<td day="'.$day_today.'">'.$day.'</td>';
							$t++;
						}else{
							echo '<td class="day-selected" day="'.$day_today.'">'.$day.'</td>';
							$t++;
						}
					}else{
						echo "<td></td>";
						$z++;
						$t++;
					}
					// Fecha a linha.
					if($n % 7 == 0){
						echo '</tr>';
					}
					// Percorre as linhas.
					$n++;
				}
			?>
		</table>
	</div><!--calendar-wraper-->
	<form action="<?php pathPainel();?>ajax/calendar.php" method="post">
		<h2 class="calendar"><i class="fas fa-plus"></i> Adicionar Tarefa para <?php echo date('d/m/Y',time());?></h2>
		<div class="group">
			<input type="text" name="task" required />
			<input type="hidden" name="date" value="<?php echo $today;?>" />
		</div><!--group-->
		<div class="group">
			<input type="hidden" name="action" value="insert" />
			<input type="submit" value="Cadastrar" />
		</div><!--group-->
	</form>
	<div class="tasks">
		<div class="calendar"><i class="fas fa-tasks"></i> Tarefas de <?php echo date('d/m/Y',time());?>:</div><!--box-title-->
		<?php
			$tasks = \Painel::getData('tb_admin.tasks','*',' WHERE date = ? ORDER BY id DESC',array($today),1,1);
			foreach($tasks as $key => $value){
		?>
			<div class="task">
				<h3><i class="fas fa-pen"></i> <?php echo $value['task'];?></h3>
			</div><!--task-->
		<?php } ?>
	</div><!--tasks-->
	<div class="clear"></div><!--clear-->
</div><!--box-->