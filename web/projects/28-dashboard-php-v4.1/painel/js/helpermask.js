$(function(){
	$('[name=cpf]').mask('999.999.999-99');
	$('[name=cnpj]').mask('99.999.999/9999-99');
	var cpf = $('[name=cpf]').val();
	var cnpj = $('[name=cnpj]').val();

	$('[name=client_type]').change(function(){
		let client_type = $(this).val();
		if(client_type == 'physical'){
			$('[ref=cpf]').show();
			$('[ref=cnpj]').hide();
			if(cnpj != '')
				cpf = '';
		}else{
			$('[ref=cpf]').hide();
			$('[ref=cnpj]').show();
			if(cpf != '')
				cnpj = '';
		}
	});
});