<?php 

function Conectar(){
	$conn = mysqli_connect(SERVER, USER, PASS, DATABASE) or die(mysqli_connect_error());
	mysqli_set_charset($conn, CHARSET) or die(mysqli_error($conn));

	return $conn;
}

function Fechar($conn){
	return mysqli_close($conn) or die(mysqli_error($conn));
}

 ?>