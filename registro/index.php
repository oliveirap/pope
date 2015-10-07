<?php 
	require_once $_SERVER['DOCUMENT_ROOT']."/pope/sistema/sistema.php";
	acessoPublico();
	validaCadastro();

 ?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Plataform Online For Problems and Exercices - Plataforma online para exercicíos interativos voltadas para o ensino de Fisica">
	<meta name="author" content="Grupo iFisica.org">
	<link rel="stylesheet" href="<?php echo URL_CSS ?>">
	<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<title>Cadastre-se</title>
</head>
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
			<label class="label-registro label-ticket clearfix">Ticket de cadastro<input type="text" id="ticket" name="ticket" class="input-cadastro input-ticket"><span class="error"></span></label>
			<input type="submit" class="input-submit btn btn-verde" name="submit" value="Cadastrar">
		</div>
	</form>


	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="<?php echo URL_JS ?>"></script>
</body>
</html>
