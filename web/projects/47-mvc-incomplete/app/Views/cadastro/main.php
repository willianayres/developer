<form method="post" id="form_register" action="<?php echo DIRPAGE;?>cadastro/cadastrar">
	Nome: <input type="text" name="name" id="name" />
	Sexo: <select name="sex" id="sex">
		<option>Selecione</option>
		<option value="Masculino">Masculino</option>
		<option value="Femenino">Femenino</option>
	</select>
	Cidade: <input type="text" name="city" id="city" />
	<input type="submit" name="register" value="Cadastrar">
</form>
<br><br>
<hr />
<br><br>
<h1>Seleção de dados</h1>
<form method="post" id="form_select" action="<?php echo DIRPAGE;?>cadastro/selecionar">
	Nome: <input type="text" name="name" id="name" />
	Sexo: <select name="sex" id="sex">
		<option>Selecione</option>
		<option value="Masculino">Masculino</option>
		<option value="Femenino">Femenino</option>
	</select>
	Cidade: <input type="text" name="city" id="city" />
	<input type="submit" name="register" value="Pesquisar">
</form>
<br><br>
<hr />
<br><br>
<div class="resultado" style="width:100%;height:300px;background:#ccc;">

</div>
