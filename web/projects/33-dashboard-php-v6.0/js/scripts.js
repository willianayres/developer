$(()=>{
	$('[name=price_min],[name=price_max]').maskMoney({prefix:'R$ ', allowNegative: true, thousands: '.', decimal: ',', affixesSyay: false});

	$(':input').bind('keyup change input',function(){
		sendRequest();
	});

	function sendRequest(){
		$('form').ajaxSubmit({
			data:{'name_building':$('input[name=search-1-text]').val()},
			success:function(data){
				$('.list-buildings .container').html(data);
			}
		});
	}
});