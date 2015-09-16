<?php 

function Escapar($entrada){
	$conn = Conectar();
	$entrada = mysqli_real_escape_string($conn, strip_tags(trim($entrada)));
	Fechar($conn);
	return $entrada;
}

function Redirect($URL){
	header("Location: ".$URL);
	if($URL == URL_BASE) die();
}

function getPost($key = null){
	if($key == null)
		return $_POST;
	else
		return (isset($_POST[$key])) ? Escapar($_POST[$key]) : false;
}

function gerarKey(){
	return sha1(rand().time());
}

function criptSenha($senha){
	return hash('sha512', $senha);
}

function userLog($valor = null){
	if($valor === null)
		return $_SESSION['userLog'];
	else
		$_SESSION['userLog'] = $valor;
}

// Funções de sessão

// cria sessão do usuário
function criaSessao($usuario, $senha){
	$key = getKey($usuario, $senha);
	userLog($key);
	acessoPublico();
}

// Finaliza Sessão
function acabaSessao(){
	Fechar();
	unset($_SESSION['userLog']);
	acessoRestrito();
}


// verifica se está logado
function estaLogado(){
	if(!isset($_SESSION['userLog']) || empty($_SESSION['userLog']))
		return false;
	else 
		if(permaneceLogado())
			return true;
		else
			acabaSessao();
}

// Controle de acesso
function acessoRestrito(){
	if(!estaLogado())
		Redirect(URL_BASE);	
}

function acessoPublico(){
	if(estaLogado())
		Redirect(URL_PAINEL);
}

function logout(){
	if(isset($_GET['logout']))
		acabaSessao();
}

?>