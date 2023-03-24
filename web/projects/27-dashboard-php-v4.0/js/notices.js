$(()=>{
	// Get the select paramenter from options.
	$('select').change(function(){
		// Redirect to the right category notice page.
		location.href = include_path + "noticias/" + $(this).val();
	});
});