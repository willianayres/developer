$(function(){
	var cur = 0;
	var max = $('.slider img').length;
	initSlider();
	clickSlider();

	function initSlider(){
		for(var i=0; i<max; i++){
			if(i == 0)
				$('.bullets-nav').append('<span style="background-color:#069;"></span>');
			else
				$('.bullets-nav').append('<span></span>');
		}
		$('.slider img').eq(0).fadeIn();
		setInterval(function(){
			changeSlider();
		},5000);
	}
	function clickSlider(){
		$('.bullets-nav span').click(function(){
			$('.slider img').eq(cur).stop().fadeOut(2000);
			cur = $(this).index();
			$('.slider img').eq(cur).stop().fadeIn(2000);
			$('.bullets-nav span').css('background-color','#ccc');
			$(this).css('background-color','#069');
		});
	}
	function changeSlider(){
		$('.slider img').eq(cur).stop().fadeOut(2000);
		cur += 1;
		if(cur == max)
			cur = 0;
		$('.bullets-nav span').css('background-color','#ccc');
		$('.bullets-nav span').eq(cur).stop().css('background-color','#069');
		$('.slider img').eq(cur).fadeIn(2000);
	}
});
