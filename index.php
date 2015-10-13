<?php 
	require_once $_SERVER['DOCUMENT_ROOT']."/pope/sistema/sistema.php";	
	acessoPublico();
 ?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
<?php
	$titulo = "Faça Login";
	include(FILE_HEAD);
?>
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