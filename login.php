<?php 
	require_once $_SERVER['DOCUMENT_ROOT']."/pope/sistema/sistema.php";
	
	acessoPublico();

 ?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Plataform Online For Problems and Exercices - Plataforma online para exercicíos interativos voltadas para o ensino de Fisica">
	<meta name="author" content="Grupo iFisica.org">
	<link rel="stylesheet" href="assets/css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<title>Faça Login</title>
</head>
<body class="login-body flex-column--center">
	<form class="login-form" action="" name="login-form" method="POST">

		<header class='login-form--header'>
			<div class="logo"></div>
			<h1 class='login-title'>POPE</h1>		
		</header>

		<section class="login-form--inputs">

			<span class="input-addon input-addon--username"></span><input type="text" name="username" placeholder='Login' required autofocus>

			<span class="input-addon input-addon--password"></span><input type="password" placeholder='Senha' required>

			<input type="submit" name="logar" value='Entrar'>



		</section>

		<p class="helper">Não tem conta? <a href="registro/" title="Cadastre-se">Cadastre-se</a></p>


	</form>	
	<div class="disclaimer-wrap">
		<p class="disclaimer">&copy; 2015 <a href="http://ifisica.org" target="_new" title="Equipe iFisica.org">iFisica.org</a></p>
	</div>
</body>
</html>