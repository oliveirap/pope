<?php 
	require_once $_SERVER['DOCUMENT_ROOT']."/pope/sistema/sistema.php";
	acessoRestrito();
 ?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
	<meta charset="UTF-8">
	<meta name="description" content="Plataform Online For Problems and Exercices - Plataforma online para exercicíos interativos voltadas para o ensino de Fisica">
	<meta name="author" content="Grupo iFisica.org">
	<link rel="stylesheet" href="assets/css/main.css">
	<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<title>Painel POPE</title>
</head>
<body>
	<h1>Painel Pope</h1>

	<h3>Bem, vindo <?php echo retornaUsuario(); ?>!</h3>
	<h3>Você é usuário do tipo <?php echo retornaTipo();?></h3>
	<?php if (retornaTipo() == "Aluno"){ ?>
		<a href="cpanel.php">Painel de Administrador</a>
	<?php } ?>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>