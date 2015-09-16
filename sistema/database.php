<?php 

function Conectar(){	
	$conn = mysqli_connect(SERVER, USER, PASS, DATABASE) or die(mysqli_connect_error());
	
	mysqli_set_charset($conn, CHARSET) or die(mysqli_error($conn));
	return $conn;
}

function Fechar($conn){
	return mysqli_close($conn) or die(mysqli_error($conn));
}

function emailExiste($email, $tb){
	$conn = Conectar();
	$tb = PREFIX."_".$tb;
	$query = "SELECT email FROM $tb WHERE email = '$email'";
	$retorno = mysqli_query($conn, $query) or die(mysqli_error($conn));
	Fechar($conn);
	if (mysqli_num_rows($retorno) <= 0)
		return false;
	else 
		return true;
}

function loginExiste($login, $tb){
	$conn = Conectar();
	$tb = PREFIX."_".$tb;
	$query = "SELECT usuario FROM $tb WHERE usuario = '$login'";
	$retorno = mysqli_query($conn, $query) or die(mysqli_error($conn));
	Fechar($conn);
	if (mysqli_num_rows($retorno) <= 0)
		return false;
	else 
		return true;
}

function matriculaExiste($matricula, $tb){
	$conn = Conectar();
	$tb = PREFIX."_".$tb;
	$query = "SELECT matricula FROM $tb WHERE matricula = '$matricula'";
	$retorno = mysqli_query($conn, $query) or die(mysqli_error($conn));
	Fechar($conn);
	if (mysqli_num_rows($retorno) <= 0)
		return false;
	else 
		return true;
}

function cadastraUsuario($nome, $email, $usuario, $senha, $matricula, $status = 1, $tipo = 1){
	$userkey = gerarKey();	
	$conn = Conectar();	
	$senha = criptSenha($senha);	
	$query = "INSERT INTO pp_users (nome, email, usuario, senha, matricula, userkey, tipo, status) VALUES ('$nome', '$email', '$usuario', '$senha', '$matricula', '$userkey', '$tipo', '$status')";
	$retorno = mysqli_query($conn, $query) or die(mysqli_error($conn));
	Fechar($conn);
	return $retorno;
}	

function getKey($usuario, $senha){
	return verificaLogin($usuario, $senha); 
}

function verificaLogin($usuario, $senha){
	$conn = Conectar();
	$senha = criptSenha($senha);
	$query = "SELECT * FROM pp_users  WHERE usuario = '$usuario' AND senha = '$senha'";
	$retorno = mysqli_query($conn, $query) or die(mysqli_error($conn));
	Fechar($conn);
	if(mysqli_num_rows($retorno) > 0){
		$data = mysqli_fetch_assoc($retorno);
		return $data['userkey'];
	}
	else 
		return false;
}

function permaneceLogado(){
	$conn = Conectar();
	$userkey = userLog();
	$query = "SELECT userkey FROM pp_users WHERE userkey = '$userkey'";
	$retorno = mysqli_query($conn, $query);
	Fechar($conn);
	if (mysqli_num_rows($retorno) <= 0)
		return false;
	else
		return true;
}




 ?>
