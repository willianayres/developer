$(()=>{
	// Get the select paramenter from options.
	$('select').change(function(){
		// Redirect to the right category notice page.
		location.href = include_path + "noticias/" + $(this).val();
	});
	// Check if the button to comment was pressed.
	$(document).on('click','.comment-notice button.awnser',function(){
		// If was, pressed, opens the textarea to put the message.
		$(this).fadeOut(400,function(){
			$(this).next().fadeIn();
		});
	});
	// Check if the button to show more comments is avaible and was clicked.
	$(document).on('submit','form.more',function(event){
		// Does not allow the page to reload.
		event.preventDefault();
		// Send an ajax to get more comments.
		// Get the notice_id and the amount of comments that was already loaded.
		$.ajax({
			url:include_path+'ajax/comments.php',
			dataType:'json',
			method:'post',
			data:{'more':'more','notice_id':$(this).children('input[name=notice_id]').val(),'amount':$(this).children('input[name=amount]').val()}
		}).done(function(data){
			// Remove the button to show more comments.
			$('form.more').remove();
			// Appends the new comments that were loaded.
			$('.notice .center').append(data['data']);
			// Animates with scroll top to the last comment that was loaded.
			var comment = $('.notice .center .comment-notice:last-child');
			comment = $(comment).offset().top;
			$('.notice .center .comment-notice').hide().fadeIn(300);
			$('html,body').animate({scrollTop:comment}, 500);
		});
	});
	// Check if the button to show more comments awnsers is avaible and was clicked.
	$(document).on('submit','form.show-awnsers',function(event){
		// Does not allow the page to reload.
		event.preventDefault();
		// Gets the comment parent that has the awnsers.
		var id = $(this).children('input[name=comment_id]').val();
		// Check if the box with awnsers is empty.
		if($('.comment-notice#'+id+' .box-awnsers').is(':empty')){
			// Send an ajax to get more comments awnsers.
			// Get the comment parente id.
			$.ajax({
				url:include_path+'ajax/comments.php',
				dataType:'json',
				method:'post',
				data:{'show-awnsers':'show-awnsers','comment_id':$(this).children('input[name=comment_id]').val()},
			}).done(function(data){
				// Appends the data in the final of the comment parente.
				$('.comment-notice#'+id+' .box-awnsers').html(data['data']);
				$('.comment-notice#'+id+' .box-awnsers').slideToggle(800);
				// Change the button to unshow the awnsers.
				$('.comment-notice#'+id+' form.show-awnsers input[name=show-awnsers]').val('Ocultar Respostas');
			});
		}else{
			// If the box with the awnsers is not empty.
			// Hide the awnsers.
			if($('.comment-notice#'+id+' form.show-awnsers input[name=show-awnsers]').val() == 'Ocultar Respostas'){
				$('.comment-notice#'+id+' .box-awnsers').slideToggle(400);
				$('.comment-notice#'+id+' form.show-awnsers input[name=show-awnsers]').val('Ver Respostas');
			// Show the awnsers.
			}else{
				$('.comment-notice#'+id+' .box-awnsers').slideToggle(800);
				$('.comment-notice#'+id+' form.show-awnsers input[name=show-awnsers]').val('Ocultar Respostas');
			}
		}
	});
	// Check if the button to show more comment awnsers was pressed.
	$(document).on('submit','form.show-more',function(event){
		// Does not allow the page to reload.
		event.preventDefault();
		// Get the id of the parent comment.
		var id = $(this).children('input[name=comment_id]').val();
		// Get the start position to load the comments and the id of the parent comment.
		$.ajax({
			url:include_path+'ajax/comments.php',
			dataType:'json',
			method:'post',
			data:{
				'show-more':'show-more',
				'start':$(this).children('input[name=start]').val(),
				'comment_id':$(this).children('input[name=comment_id]').val()
			},
		}).done(function(data){
			// Append all the comments in the awnsers of the parent comment.
			$('.comment-notice#'+id+' .box-awnsers form.show-more').remove();
			$('.comment-notice#'+id+' .box-awnsers').append(data['data']);
		});
	});
});