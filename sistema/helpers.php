<?php 

function Escapar($entrada){
	$entrada = mysqli_real_escape_string($conn, strip_tags(trim($entrada)));
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

// Funções de sessão

// verifica se está logado
function estaLogado(){
	if(!isset($_POST['userLog']) || empty($_POST['userLog']))
		return false
	else 
		acabaSessao();

}

?>