$(()=>{
	$('[name=price_min],[name=price_max]').maskMoney({prefix:'R$ ', allowNegative: true, thousands: '.', decimal: ',', affixesSyay: false});

	$('.search-1 input,.search-2 input').bind('keyup change input',function(){
		sendRequest();
	});

	function sendRequest(){
		$('.search-2 form').ajaxSubmit({
			data:{'name_building':$('input[name=search-1-text]').val()},
			success:function(data){
				$('.list-buildings .center').html(data);
			}
		});
	}

	var amountItems = $('.header-buildings nav.desktop ul li').length;
	var curIndex = 0;
    var items = [];
	width = $(window).width();

	if(width < 800){
		if($('.header-buildings p i').length > 0){
			$('.header-buildings p[next] i').remove();
			$('.header-buildings p[prev] i').remove();
			$('.header-buildings p[next]').append('<i class="fas fa-angle-double-down"></i>');
			$('.header-buildings p[prev]').append('<i class="fas fa-angle-double-up"></i>');
		}
	}else{
		if($('.header-buildings p i').length > 0){
			$('.header-buildings p[next] i').remove();
			$('.header-buildings p[prev] i').remove();
			$('.header-buildings p[next]').append('<i class="fas fa-angle-double-right"></i>');
			$('.header-buildings p[prev]').append('<i class="fas fa-angle-double-left"></i>');
		}
	}

	$(window).resize(function(){
		width = $(window).width();
		if(width < 800){
			if($('.header-buildings p i').length > 0){
				$('.header-buildings p[next] i').remove();
				$('.header-buildings p[prev] i').remove();
				$('.header-buildings p[next]').append('<i class="fas fa-angle-double-down"></i>');
				$('.header-buildings p[prev]').append('<i class="fas fa-angle-double-up"></i>');
			}
		}else{
			if($('.header-buildings p i').length > 0){
				$('.header-buildings p[next] i').remove();
				$('.header-buildings p[prev] i').remove();
				$('.header-buildings p[next]').append('<i class="fas fa-angle-double-right"></i>');
				$('.header-buildings p[prev]').append('<i class="fas fa-angle-double-left"></i>');
			}
		}
	});

    if(amountItems > 3){
		function startHeader(){
			$('.header-buildings nav.desktop ul li').hide();
			for(i=0; i<3; i++){
				$('.header-buildings nav.desktop ul li').eq(i).show();
			}
		}

		function getItems(){
			for (i=0;i<amountItems;i++){
				items.push($('.header-buildings nav.desktop ul li'));
			}
		}

		function navHeader(){
			$('[next]').click(function(){
				curIndex++;
				if(curIndex >= amountItems){
					$('.header-buildings nav.desktop ul li').eq(amountItems-3).hide();
					item = $('.header-buildings nav.desktop ul li').eq(amountItems-1);
					$('.header-buildings nav.desktop ul li').eq(amountItems-1).remove();
					$('.header-buildings nav.desktop ul').prepend(item);
					item = $('.header-buildings nav.desktop ul li').eq(amountItems-1);
					$('.header-buildings nav.desktop ul li').eq(amountItems-1).remove();
					$('.header-buildings nav.desktop ul').prepend(item);
					startHeader();
					curIndex = 0;
				}
				if(curIndex < amountItems-2){
					$('.header-buildings nav.desktop ul li').eq(curIndex-1).hide();
					$('.header-buildings nav.desktop ul li').eq(curIndex+2).show();
				}else if(curIndex < amountItems-1){
					item = $('.header-buildings nav.desktop ul li').eq(0);
					$('.header-buildings nav.desktop ul li').eq(0).remove()
					$('.header-buildings nav.desktop ul li').eq(curIndex-2).hide();
					$('.header-buildings nav.desktop ul').append(item);
					$('.header-buildings nav.desktop ul li').eq(amountItems-1).show();	
				}else if(curIndex < amountItems){
					item = $('.header-buildings nav.desktop ul li').eq(0);
					$('.header-buildings nav.desktop ul li').eq(0).remove();
					$('.header-buildings nav.desktop ul li').eq(curIndex-3).hide();
					$('.header-buildings nav.desktop ul').append(item);
					$('.header-buildings nav.desktop ul li').eq(amountItems-1).show();	
				}
			});

			$('[prev]').click(function(){
				curIndex--;
				if(curIndex < 0){
					$('.header-buildings nav.desktop ul li').eq(2).hide();
					item = $('.header-buildings nav.desktop ul li').eq(amountItems-1);
					$('.header-buildings nav.desktop ul').prepend(item);
					startHeader();
					curIndex = amountItems-1;
				}else if(curIndex >= amountItems -2 && curIndex <= amountItems-1){
					$('.header-buildings nav.desktop ul li').eq(1).hide();
					item = $('.header-buildings nav.desktop ul li').eq(amountItems-1);
					$('.header-buildings nav.desktop ul').prepend(item);
					startHeader();
				}else if(curIndex >= amountItems-3 && curIndex < amountItems-1){
					$('.header-buildings nav.desktop ul li').eq(0).hide();
					item = $('.header-buildings nav.desktop ul li').eq(amountItems-1);
					$('.header-buildings nav.desktop ul li').eq(amountItems-1).remove();
					$('.header-buildings nav.desktop ul').prepend(item);
					startHeader();
				}else{
					$('.header-buildings nav.desktop ul li').remove();
					for(i=0;i<amountItems;i++)
						$('.header-buildings nav.desktop ul').append(items[i]);
					$('.header-buildings nav.desktop ul').prepend($('.header-buildings nav.desktop ul li').eq(curIndex+2));
					$('.header-buildings nav.desktop ul').prepend($('.header-buildings nav.desktop ul li').eq(curIndex+2));
					$('.header-buildings nav.desktop ul').prepend($('.header-buildings nav.desktop ul li').eq(curIndex+2));
					startHeader();
				}
			});
		}
		getItems();
	    startHeader();
	    navHeader();
	}else{
		$('[next]').hide();
		$('[prev]').hide();
	}
});