$(()=>{
	
	// Variabels.
	var box = $('.specialties');
	var now = -1;
	var max = box.length - 1;
	var timer;
	// Function to fade in the boxes:
	// Hide all the boxes at the start > Start the timer > Increment the actual box >
	// Check to finish the animation > Fade in the actual box.
	function specialtiesFadeIn(){
		box.hide();
		timer = setInterval(animation,1500);
		function animation(){
			now++;
			if(now > max){
				clearInterval(timer);
				return false;
			}
			box.eq(now).fadeIn();
		}
	}
	// Function call.
	specialtiesFadeIn();
});