$(function(){
	
	// ---------- MENU MOBILE JS -----------
	$('.mobile-menu').click(function(){
		$('.mobile-menu ul').slideToggle();
	});
	// -------------------------------------

	// --------------- MENU SCROLL JS ------------------
	$('nav a').click(function(){
		var href = $(this).attr('href');
		var offSetTop = $(href).offset().top;

		$('html,body').animate({'scrollTop':offSetTop});

		return false;
	});
	// -------------------------------------------------

	// ------- SLIDER EQUIPE JS --------

	initSlider();
	autoPlay();

	var curIndex = 0;
	var atm;
	var delay;

	function initSlider(){
		amt = $('.sobre-autor').length;
		var sizeContainer = 100 * amt;
		var sizeBoxSingle = 100 / amt;
		$('.sobre-autor').css('width',sizeBoxSingle+'%');
		$('.scroll-wraper').css('width',sizeContainer+'%');

		for(var i = 0; i < amt; i++){
			if(i == 0){
				$('.slider-bullets').append('<span style="background-color:rgb(170,170,170);"></span>');
			}else{
				$('.slider-bullets').append('<span></span>');
			}
		}

	}

	function autoPlay(){
		setInterval(function(){
			curIndex++;
			if(curIndex == amt)
				curIndex = 0;
			goToSlider(curIndex);
		},3000);
	}

	function goToSlider(curIndex){
		var offSetX = $('.sobre-autor').eq(curIndex).offset().left - $('.scroll-wraper').offset().left;
		$('.slider-bullets span').css('background-color','rgb(200,200,200)');
		$('.slider-bullets span').eq(curIndex).css('background-color','rgb(170,170,170)');
		$('.scrollEquipe').stop().animate({'scrollLeft':offSetX+'px'});
	}

	$(window).resize(function(){
		$('.scrollEquipe').stop().animate({'scrollLeft':0});
	});

	// --- MAP ---
	var map;

	function initialize(){
		var mapProp = {
			center: new google.maps.LatLng(-25.4228592,-49.2028511),
			scrollwheel:false,
			zoom:12,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		}

		map = new google.maps.Map(document.getElementById("mapa"),mapProp);
	}

	function addMarker(lat,long,icon,content,click){
		var latLng = {'lat':lat,'lng':long};

		var marker = new google.maps.Marker({
			position:latLng,
			map:map,
			icon:icon
		});

		var infoWindow = new google.maps.InfoWindow({
			content:content,
			maxWidth:200,
			pixelOffset: new google.maps.Size(0,20)
		});

		if(click == true){
			google.maps.event.addListener(marker,'click',function(){
				infoWindow.open(map,marker);
			});
		}else{
			infoWindow.open(map,marker);
		}
		
	}

	initialize();

	var conteudo = '<p style="color:black;font-size:13px;padding:10px 0;border-bottom:1px solid black;">Meu endereço</p>';
	addMarker(-25.4228592,-49.2028511,'',conteudo,true);

});