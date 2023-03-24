$(()=>{
	$( ".btn-add" ).click(function(){
		var el = '<div class="anotacao"><textarea placeholder="Sua nova anotação..."></textarea></div>' 
		$( ".container" ).append(el);
		var textArea = $( ".anotacao" ).last().find('textarea');
		var date = new Date();
		var h = date.getHours();
		var m = date.getMinutes();
		var finalTime = h+":"+m;
		textArea.html("Nova anotação em: "+finalTime);
	});
});