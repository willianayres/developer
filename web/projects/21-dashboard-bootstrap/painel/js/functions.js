$(()=>{
	menu();
	scroll();
	function menu(){
		$('#ul-header a, .list-group a').click(function(){
			$('#ul-header a').parent().removeClass('active').removeClass('color');
			$('.list-group a').removeClass('active').removeClass('color');
			$('#ul-header a[page='+$(this).attr('page')+']').parent().addClass('active').addClass('color');
			$('.list-group a[page='+$(this).attr('page')+']').addClass('active').addClass('color');
			return false;
		});
	}
	function scroll(){
		$('#ul-header a, .list-group a').click(function(){
			let page = '#'+$(this).attr('page');
			let offset = $(page).offset().top - 50;
			$('html,body').animate({'scrollTop':offset});
			if($(window)[0].innerWidth <= 768)
				$('.icon-bar').click();
			return false;
		});
	}
	$('button.del').click(function(){
		var id_member = $(this).attr('id_member');
		$.ajax({
			method:'post',
			data:{'id_member':id_member},
			url:'delete.php'
		}).done(function(){
			$(this).parent().parent().fadeOut(function(){
				$(this).parent().parent().remove();
			});
		});
	});
});