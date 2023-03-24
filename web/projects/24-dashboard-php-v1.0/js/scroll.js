$(()=>{
	// Variable.
	var target = $('target');
	// Check if there's some target to scroll > Get the element that have the target atributte >
	// Scroll to the element as animation
	if(target.length > 0){
		var el = '#' + target.attr('target');
		var divScroll = $(el).offset().top;
		$('html,body').animate({scrollTop:divScroll}, 2000);
	}
});