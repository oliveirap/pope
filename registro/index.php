<?php 
	require_once $_SERVER['DOCUMENT_ROOT']."/pope/sistema/sistema.php";
	acessoPublico();
	$erros = validaCadastro();
 ?>
<!DOCTYPE html>
<html lang="PT-BR">
<?php 
	$titulo = "Registre-se";	
	include(FILE_HEAD); 
?>
<body class="_100vh bg">
	
	<form id="form-cadastro" method="POST" class="formulario-cadastro" action="<?php echo $_SERVER['PHP_SELF']  ?>">
		<h3 class="form-heading">Registre-se</h3>
		<p class="form-topic">Informações Pessoais</p>
		<div class="wrapper-form">
			<label class="label-registro">Nome<input type="text" id="nome" name="nome" class="input-cadastro"><span class="error"></span></label>
			<label class="label-registro">E-mail<input type="mail" id="mail" name="email" class="input-cadastro"><span class="error"></span></label>
			<label class="label-registro">Confirme seu e-mail<input id="cmail" type="mail" name="cemail" class="input-cadastro"><span class="error"></span></label>
			<label class="label-registro">Matrícula<input type="text" id="matr" name="matricula" class="input-cadastro"><span class="error"></span></label>
		</div>
		<p class="form-topic">Informações da conta</p>
		<div class="wrapper-form clearfix">
			<label class="label-registro">Usuário<input type="text" id="usuario" name="usuario" class="input-cadastro"><span class="error"></span></label>
			<label class="label-registro">Senha<input type="password" id="senha" name="senha" class="input-cadastro"><span class="error"></span></label>
			<label class="label-registro">Confirme sua senha<input type="password" id="csenha" name="csenha" class="input-cadastro"><span class="error"></span></label>
			<label class="label-registro label-ticket clearfix"><p class="block">Ticket de cadastro</p><input type="text" id="ticket" name="ticket" class="input-cadastro input-ticket"><span class="error inline"></span></label>
			<?php echo $erros ?>
			<input type="submit" id="register-submit" class="input-submit btn azul" name="submit" value="Cadastrar">
		</div>
	</form>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="http://localhost:8080/pope/assets/js/jquery.js"></script>
	<script src="<?php echo URL_JS ?>"></script>
</body>
</html>
