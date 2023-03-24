$(function(){
	let td = $('table.calendar td').length - 7;
	let last_tr = $('table.calendar tr').length;
	
	while($('table.calendar tr:nth-of-type('+last_tr+') td').length < 7){
		$('table.calendar tr:nth-of-type('+last_tr+')').append('<td></td>');
		last_tr = $('table.calendar tr').length;
	}

	$('table.calendar tr td[day]').click(function(){
		if($(this).html() != ''){
			//alert('Cliquei no dia '+parseInt($(this).html()));
			$('td').removeClass('day-selected');
			$(this).addClass('day-selected');
			var new_day = $(this).attr('day').split('-');
			new_day = new_day[2] + '/' + new_day[1] + '/' + new_day[0];
			changeDate($(this).attr('day'),new_day);
			callEvents($(this).attr('day'));
		}
	});

	$('form').ajaxForm({
		dataType:'json',
		success:function(data){
			//if($('form div.alert').length > 0)
			$('form div.alert').remove();
			$('form h2.calendar').after('<div class="alert success"><i class="far fa-check-circle"></i> Tarefa adicionada com sucesso!</div>');
			$('.tasks .calendar').after('<div class="task"><h3><i class="fas fa-pen"></i> '+data.task+'</h3></div><!--task-->');
			$('form')[0].reset();
		}
	});

	function changeDate(no_format,format){
		$('input[name=date]').attr('value',no_format);
		$('form h2.calendar').html('<i class="fas fa-plus"></i> Adicionar Tarefa para '+format);
		$('.tasks .calendar').html('<i class="fas fa-tasks"></i> Tarefas de '+format);
	}
	
	function callEvents(date){
		$('.task').remove();
		$.ajax({
			url:include_path+'ajax/calendar.php',
			method:'post',
			data:{'date':date,'action':'get'}
		}).done(function(data){
			$('.tasks .calendar').after(data);
		});
	}
	
});