<?php 
	require_once $_SERVER['DOCUMENT_ROOT']."/pope/sistema/sistema.php";	
	acessoPublico();
 ?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<meta name="description" content="Plataform Online For Problems and Exercices - Plataforma online para exercicíos interativos voltadas para o ensino de Fisica">
	<meta name="author" content="Grupo iFisica.org">
	<link rel="stylesheet" href="<?php echo URL_CSS ?>">
	<link rel="stylesheet" href="<?php echo URL_FONT ?>">
	<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
	<title>Login</title>
</head>
<body>
<div class="login-body _100vh bg flex-column--center">
	<div class="wrapper">
		<?php validaLogin(); ?>
	</div>
	<form class="login-form" id="login-form" action="" name="login-form" method="POST">
		<header class='login-form--header'>
			<div class="logo"></div>
			<h1 class='login-title'>POPE</h1>		
		</header>
		<section class="login-form--inputs">
			<span class="input-addon input-addon--username"></span><input type="text" name="usuario" id="input-usuario" placeholder='Login'   >
			<span class="input-addon input-addon--password"></span><input type="password" name="senha" placeholder='Senha' id="input-senha" >
			<input type="submit" name="logar" id="login-toggle" value='Entrar'>
		</section>
		<p class="helper">Não tem conta? <a href="registro/" title="Cadastre-se">Cadastre-se</a></p>
	</form>	
	<div class="disclaimer-wrap">
		<p class="disclaimer">&copy; 2015 <a href="http://ifisica.org" target="_new" title="Equipe iFisica.org">iFisica.org</a></p>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="assets/js/jquery.js"></script>
	<script src="assets/js/custom.js"></script>
	</div>
</body>
</html>