<?php 
	require_once $_SERVER['DOCUMENT_ROOT']."/pope/sistema/sistema.php";
	acessoRestrito();
 ?>
<!DOCTYPE html>
<html lang="PT-BR">
<head>
<?php 
	$titulo = "Painel";	
	include(FILE_HEAD); 
?>
</head>
<body>
	<div class="container-fluid">
		<nav class="nav principal">
			<nav class="nav principal topo">
			Nav Top
			</nav>

		</nav>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>

