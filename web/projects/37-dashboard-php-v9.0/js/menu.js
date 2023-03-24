$(()=>{
	// Event to show the menu by clicking:
	// Get the icon and ul boxes > Get the classes to icons > Check if it's open or not >
	// If open, remove the close and put the open classes > If not, the reverse of it >
	// Stop the actual animation of the ul box, then slide toggle it.
	$('.mobile').click(()=>{
		var icon = $('.mobile .button i');
		var ul = $('.mobile ul');
		var close = 'fas fa-bars';
		var open = 'far fa-times-circle';
		if(ul.is(':hidden')){
			icon.removeClass(close);
			icon.addClass(open);
		}else{
			icon.removeClass(open);
			icon.addClass(close);
		}
		ul.stop().slideToggle();
	});
});