<?php 
	require_once $_SERVER['DOCUMENT_ROOT']."/pope/sistema/sistema.php";
	require_once FILE_ADMIN_FUNCTIONS;
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
<body class="corpo-interno">
	<?php include(FILE_NAV_TOPO) ?>
	<div class="container-fluid">
		<div class="row row-sp">
			<div class="col-sm-2 hidden-xs">
				<nav class="nav lateral principal">
					<div class="nav-hero">
						<img class="img-responsive center-block img-circle" src="http://placehold.it/150x150" alt="">
						<p class="text-center">Olá, Admin</p>
					</div>
					<ul class="fa-ul list-menu-principal">
						<li class="drop-toggle"><a href=""><i class="fa fa-dot-circle-o fa-fw"></i>&nbsp;Questões</a>
							<ul class="fa-ul">
								<li><a href=""><i class="fa fa-list-ul fa-fw"></i>&nbsp;Listar</a></li>
								<li><a href=""><i class="fa fa-plus-square-o fa-fw"></i>&nbsp;Criar</a></li>
							</ul>
						</li>
						<li class="drop-toggle"><a href=""><i class="fa fa-pencil-square-o fa-fw"></i>&nbsp;Listas</a>
							<ul class="fa-ul">
								<li><a href=""><i class="fa fa-list-ul fa-fw"></i>&nbsp;Listar</a></li>
								<li><a href=""><i class="fa fa-plus-square-o fa-fw"></i>&nbsp;Criar</a></li>
							</ul>
						</li>
						<li class="drop-toggle"><a href=""><i class="fa fa-graduation-cap fa-fw"></i>&nbsp;Estudantes</a>
							<ul class="fa-ul">
								<li><a href=""><i class="fa fa-list-ul fa-fw"></i>&nbsp;Listar</a></li>
								<li><a href=""><i class="fa fa-user-plus fa-fw"></i>&nbsp;Criar</a></li>
							</ul>
						</li>
						<li class="add-spinner"><a href=""><i class="fa fa-cog fa-fw"></i>&nbsp;Painel</a></li>
					</ul>
				</nav>
			</div>
			<div class="col-sm-10 col-xs-12 page-wrapper">
			<?php var_dump(isAdmin()); ?>
			</div>
		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>