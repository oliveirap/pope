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
	$tb = PREFIX."_".$tb
	$query = "SELECT email FROM $tb WHERE email = '$email'";
	$retorno = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if (mysqli_num_rows($retorno) <= 0)
		return false
	else 
		return true
}

function loginExiste($login, $tb){
	$conn = Conectar();
	$tb = PREFIX."_".$tb
	$query = "SELECT usuario FROM $tb WHERE usuario = '$login'";
	$retorno = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if (mysqli_num_rows($retorno) <= 0)
		return false
	else 
		return true
}

function cadastraUsuario($nome, $email, $usuario, $senha, $matricula, $status, $tipo){
	
}

 ?>