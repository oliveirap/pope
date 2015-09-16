<?php 

function retornaDados(){
	$conn = Conectar();
	$userkey = userLog();
	$query = "SELECT * FROM pp_users WHERE userkey = '$userkey'";	
	$retorno = mysqli_query($conn, $query) or die(mysqli_error($conn));	
	Fechar($conn);
	//var_dump($retorno);
	if(mysqli_num_rows($retorno) >= 0){
		$data = mysqli_fetch_assoc($retorno);		
		return $data;
	}

	else return null;
}

function retornaUsuario(){
	$data = retornaDados();
	return $data['usuario'];
}

function retornaTipo(){
	$data = retornaDados();
	$tipo = $data['tipo'];	
	if($tipo == "1") return "Aluno";
	else if ($tipo == "2") return "Professor";
	else if ($tipo == "3") return "Admin";
}

 ?>