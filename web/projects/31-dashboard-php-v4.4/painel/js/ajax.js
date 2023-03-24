$(function(){
	$('form.ajax').ajaxForm({
		dataType:'json',
		beforeSend: function(){
			$('form.ajax').animate({'opacity':'0.4'});
			$('form.ajax').find('input[type=submit]').attr('disabled','true');
		},
		success: function(data){
			$('form.ajax').animate({'opacity':'1'});
			$('form.ajax').find('input[type=submit]').removeAttr('disabled');
			$('.alert').remove();
			if(data.success){
				$('form.ajax').prepend('<div class="alert success"><i class="far fa-check-circle"></i>'+data.msg+'</div>');
				if(!$('form.ajax .group input[name=action_type]').val() == 'update')
					$('form.ajax')[0].reset();
			}else
				$('form.ajax').prepend('<div class="alert error"><i class="fas fa-times"></i><em>'+data.msg+'</em></div>');
		}
	});

	$('.boxes .boxes-wraper .box-single .body .buttons a.del').click(function(e){
		e.preventDefault();
		var box = $(this).parent().parent().parent().parent();
		var item_id = $(this).attr('item_id');
		$.ajax({
			url:include_path+'ajax/forms.php',
			data:{id:item_id,action_type:'delete'},
			method:'post'
		}).done(function(){
			box.fadeOut();
		});
	});

	//$('.boxes .boxes-wraper .box-single .body .buttons a.edit').click(function(e){

	//});
});