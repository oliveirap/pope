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
	<link rel="stylesheet" href="../assets/css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<title>Cadastre-se</title>
</head>
<body class="register-body flex-column--center">
	<h1>Registre-se</h1>
	<form action="" method="post" name="registro-form" class="register-form">
	<div class="register-form--inputs">
		<input type="text" name="nome" placeholder="Seu nome" required>
		<input type="email" name="email" placeholder="Email" required>
		<input type="email" name="confirmaEmail" placeholder="Confirme seu email" required>
		<input type="text" name="usuario" placeholder="Usuário" required>
		<input type="password" name ="senha" placeholder="Senha" required>
		<input type="password" name ="confirmaSenha" placeholder="Confirme sua senha" required>
		<input type="text" name="matricula" placeholder="Matricula" required>
		<input type="submit" value="Cadastrar" name="send">
	</div>
	</form>	
</body>
</html>