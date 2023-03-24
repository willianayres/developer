$(function(){
	/*
	$('form').ajaxForm({
		success:function(data){
			console.log(data);
		}
	});
	*/

	$('.box-chat').scrollTop($('.box-chat')[0].scrollHeight);

	// Function to check if a key was pressed insede the textarea.
	$('textarea').bind('keyup',function(e){
		// Check if the key was enter.
		var code = e.keyCode || e.which;
		if(code == 13 && $('textarea').val() != ''){
			// Calls the function to insert the message in database.
			insertChat();
		}
	});

	// Check if the form was submit.
	$('form').submit(function(){
		// Calls the function to insert the message in database.
		insertChat();
		return false;
	});

	// Function to insert the message in database.
	function insertChat(){
		// Get the message inside the textarea.
		var msg = $('textarea').val();
		// Calls the ajax.
		$.ajax({
			url:include_path+'ajax/chat.php',
			method:'post',
			data:{'message':msg,'action':'insert_message'}
		}).done(function(data){
			$('textarea').val('');
			$('.box-chat').append(data);
			$('.box-chat').scrollTop($('.box-chat')[0].scrollHeight);
		});
	}

	function getChat(){
		$.ajax({
			url:include_path+'ajax/chat.php',
			method:'post',
			data:{'action':'get_messages'}
		}).done(function(data){
			$('.box-chat').append(data);
			$('.box-chat').scrollTop($('.box-chat')[0].scrollHeight);
		});
	}

	setInterval(function(){
		getChat();
	},3000);
});