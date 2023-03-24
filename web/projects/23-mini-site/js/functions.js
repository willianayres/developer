$(document).ready(function(){
	$('.slider').slick({
		dots:true,
		arrows:false,
		infinite:true,
		centerMode:true,
		centerPadding:0,
		speed:1000,
		slidesToShow:3,
		slidesToScroll:3,
		autoplay:true,
		autoplaySpeed:3000,
		pauseOnHover:false,
		responsive:[
			{
				breakpoint:768,
				settings:{
					slidesToShow:1,
					slidesToScroll:1
				}
			}
		]
	});
	let menu = document.querySelector('.itens-mobile i');
	menu.addEventListener('click',()=>{
		document.querySelector('section.one .itens-mobile .ul').classList.add('show');
	});
});