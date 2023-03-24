$(function(){
	/*
	var f = 'will.joris@hotmail.com';
	// Encontra o que quiser num range.
	// var v = f.match(/[A-Za-z0-9]{3,6}/);
	   var v = f.match(/^(.*?)@(.*?)$/);
	
	if(v != null){
		console.log("Encontramos algo!");
		console.log(v[1]);
		console.log(v[2]);
	}else{
		console.log("Não encontramos nada.");
	}
	*/
	openWindow();
	checkClose();
	
	function openWindow(){
		$('.btn').click(function(e){
			e.stopPropagation();
			$('.bg').fadeIn();
		});
	}
	function checkClose(){
		var el = $('body,.closeBtn');
		el.click(function(){
			$('.bg').fadeOut();
		});
		$('.form').click(function(e){
			e.stopPropagation();
		});
	}
	$('form#form1').submit(function(){
		var name 	 = $('input[name=name]').val();
		var phone 	 = $('input[name=phone]').val();
		var email 	 = $('input[name=email]').val();
		var amount 	 = nome.split(' ').length;
		var splitStr = nome.split(' ');
		if(amount >= 2){
			for(var i = 0; i < amount; i++){
				if(splitStr[i].match(/^[A-Z]{1}[a-z]{1,}$/))
					//ok.
					console.log('ok');
				else{
					invalid($('input[name=name]'));
					return false;
				}
			}
		}else{
			invalid($('input[name=name]'));
			return false;
		}
		return false;
	});
	function invalid(el){
		el.css('border','2px solid red');
		el.data('invalido','true');
		el.val('Campo Inválido!');
	}
});