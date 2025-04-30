$(document).ready(function(){
	var DIRPAGE = "http://"+document.location.host+"/mvc/";
	$('#form_select').on('submit',function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			url:DIRPAGE+'cadastro/selecionar',
			method:'post',
			dataType:'html',
			data:data,
			success:function(data){
				$('.resultado').html(data);
			}
		});
	});
});