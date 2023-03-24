$(function(){
	$('#sortable').sortable({
		start: function(){
			$(this).find('.boxes-wraper > .boxes-wraper-inside:nth-of-type(1)').css('border','1px dotted #ccc');
		},
		update: function(event,ui){
			var data = $(this).sortable('serialize');
			console.log(data);
			data += '&action_type=order_items';
			$(this).find('.boxes-wraper > .boxes-wraper-inside:nth-of-type(1)').css('border','1px solid #CCC');
			$.ajax({
				url: include_path+'ajax/sortable.php',
				method:'post',
				data: data
			}).done(function(data){
				console.log(data)
			});
		},
		stop: function(){
			$(this).find('.boxes-wraper > .boxes-wraper-inside:nth-of-type(1)').css('border','1px solid #ccc');
		},
		cursor:'move'
	});
	$('#sortable').disableSelection();
});