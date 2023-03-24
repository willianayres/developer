$(()=>{
	// Function to send a form by ajax:
	// On submit click > Get the form content > Fade in the loader box > Get the url >
	// The method > The data > Serialize the form content > After sending, display a >
	// Success box if ok > Error box if it had an error in sending.
	$('body').on('submit','form.form-ajax',function(){
		var form = $(this);
		var overlay = $('.overlay-loading');
		var yes = 'form-success';
		var not = 'form-error';
		$.ajax({
			beforeSend:()=>{overlay.fadeIn();},
			url:include_path+'ajax/forms.php',
			method:'post',
			dataType:'json',
			data:form.serialize()
		}).done(function(data){
			if(data["success"]){
				console.log("E-mail successfully sent!");
				overlay.fadeOut();
				$('body').prepend('<div class="'+yes+'">Formulário enviado com sucesso!</div>');
				let sent = $('.'+yes);
				sent.fadeIn();
				setTimeout(()=>{sent.fadeOut(500);},3000);
				setTimeout(()=>{sent.remove();},3500);
			}else{
				console.log("Some Error has ocurred!");
				overlay.fadeOut();
				$('body').prepend('<div class="'+not+'">Erro ao enviar formulário!</div>');
				let erro = $('.'+not);
				erro.fadeIn();
				setTimeout(()=>{erro.fadeOut(500);},3000);
				setTimeout(()=>{erro.remove();},3500);
			}
		});
		return false;
	});
});