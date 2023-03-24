$(()=>{
	// Variabels.
	var banner = $('.banner-single');
	var max    = banner.length - 1;
	var slide  = 0;
	var buls   = '.bullets';
	var span   = buls + ' span';
	// Function to initializa the slider:
	// Hide all the slides > Show the first > Show the bullets as many as slides >
	// If it's the first bullet, put the class active.
	function startSlide(){
		banner.hide();
		banner.eq(0).show();
		var bullets = $(buls).html();
		for(let i = 0; i <= max; i++){
			bullets += (i == 0) ? '<span class="active"></span>' : '<span></span>';
			$(buls).html(bullets);
		}
	}
	// Function to change the slide automatically:
	// Set a interval to change the slide > Hide the actual slide > Pass to the next >
	// If it's the last, reestart the slider > Show the actual slide >
	// Check to put the class active.
	function alterSlide(){
		setInterval(function(){
			banner.eq(slide).stop().fadeOut(1500);
			slide++;
			if(slide > max)
				slide = 0;
			banner.eq(slide).stop().fadeIn(1500);
			$(span).removeClass('active');
			$(span).eq(slide).addClass('active');
		}, 3000);
	}
	// Event to change the slide by clicking:
	// Get the bullet that was clicked > Stop the animation > Get the index of the slide >
	// Show the slide > Put the class active.
	$('body').on('click',span,function(){
		var bullet = $(this);
		banner.eq(slide).stop().fadeOut(750);
		slide = bullet.index();
		banner.eq(slide).stop().fadeIn(750);
		$(span).removeClass('active');
		bullet.addClass('active');
	});
	// Functions calls.
	startSlide();
	alterSlide();
});