<?php 
	require_once $_SERVER['DOCUMENT_ROOT']."/pope/sistema/sistema.php";
	acessoRestrito();
 ?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
<?php 
	$titulo = "Painel";	
	include(FILE_HEAD) 
?>
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

