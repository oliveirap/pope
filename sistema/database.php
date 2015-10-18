<?php 
function Conectar(){	
	$conn = mysqli_connect(SERVER, USER, PASS, DATABASE) or die(mysqli_connect_error());
	mysqli_set_charset($conn, CHARSET) or die(mysqli_error($conn));
	return $conn;
}

function Fechar($conn){
	return mysqli_close($conn) or die(mysqli_error($conn));
}

function DB_Query($query){
	$conn = Conectar();
	$result = mysqli_query($conn, $query) or die (mysqli_error($conn));
	Fechar($conn);
	return $result;

}
function emailExiste($email, $tb){
	$conn = Conectar();
	$tb = PREFIX."_".$tb;
	$query = "SELECT email FROM $tb WHERE email = '$email'";
	$retorno = mysqli_query($conn, $query) or die(mysqli_error($conn));
	Fechar($conn);
	if (mysqli_num_rows($retorno) > 0)
		return true;
	else 
		return false;
}
function loginExiste($login, $tb){
	$conn = Conectar();
	$tb = PREFIX."_".$tb;
	$query = "SELECT usuario FROM $tb WHERE usuario = '$login'";
	$retorno = mysqli_query($conn, $query) or die(mysqli_error($conn));
	Fechar($conn);
	if (mysqli_num_rows($retorno) > 0)
		return true;
	else 
		return false;
}
function matriculaExiste($matricula, $tb){
	$conn = Conectar();
 	$tb = PREFIX."_".$tb;
	$query = "SELECT matricula FROM $tb WHERE matricula = '$matricula'";
	$retorno = mysqli_query($conn, $query) or die(mysqli_error($conn));
	//var_dump($retorno);
	Fechar($conn);
	if (mysqli_num_rows($retorno) > 0)
		return true;
	else 
		return false;
}
function ticketDisp($ticket, $tb){
		$ticket = Escapar($ticket);
		$conn = Conectar();
		$tb = PREFIX."_".$tb;
		$query = "SELECT cod, lim, reg FROM $tb WHERE cod = '$ticket'";
		$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if(mysqli_num_rows($result) > 0){
			$data = mysqli_fetch_assoc($result);
			if($data['reg'] < $data['lim'])
				return true;
			else
				return false;
		}
		else
			return false;
}
function cadastraUsuario($nome, $email, $usuario, $senha, $matricula, $ticket, $status = 1, $tipo = 1){
	$userkey = gerarKey();	
	$conn = Conectar();	
	$senha = criptSenha($senha);	
	$query = "INSERT INTO pp_users (nome, email, usuario, senha, matricula, userkey, tipo, status) VALUES ('$nome', '$email', '$usuario', '$senha', '$matricula', '$userkey', $tipo, $status)";
	$retorno = mysqli_query($conn, $query) or die(mysqli_error($conn));
	if(!!$retorno){
		$retorno = cadastraTicket($ticket);		
	}
	Fechar($conn);
	return $retorno;
}

function cadastraTicket($ticket, $lim = 0){
	$lim =  Escapar($lim);
	$ticket = Escapar($ticket);
	$conn = Conectar();
	// Verifica se é para cadastrar usuario no ticket ou o proprio ticket
	// Se for para cadastrar o usuario, faz update na parada.
	// Se for para criar o ticket, verifica se o cod já não está sendo usado;
	if($lim == 0){ // Cadastra usuário
		$query = "SELECT * FROM pp_tickets WHERE cod = '$ticket'";
		$retorno = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if(mysqli_num_rows($retorno) > 0){
			$data = mysqli_fetch_assoc($retorno);
			if($data['lim'] > $data['reg']){ // Verifica ticket para evitar erros
				$reg = $data['reg'] + 1;
				$query = "UPDATE pp_tickets SET reg = $reg WHERE cod = '$ticket'";
				$retorno = mysqli_query($conn, $query) or die(mysqli_error($conn));
			}
		}
	}
	else{ // Cadatra Ticket
		$query = "SELECT * FROM pp_tickets WHERE cod = '$ticket'";
		$retorno = mysqli_query($conn, $query) or die(mysqli_error($conn));
		if(mysqli_num_rows($retorno) <= 0){
			$query = "INSERT INTO pp_tickets (cod, lim, reg) VALUES ('$ticket', $lim, 0)";
			$retorno = mysqli_query($conn, $query) or die(mysqli_error($conn));
		}
		else
			return false;
	}
	Fechar($conn);
	return $retorno;
}

function getKey($usuario, $senha){
	return verificaLogin($usuario, $senha); 
}

function verificaLogin($usuario, $senha){
	$conn = Conectar();
	$senha = criptSenha($senha);
	$query = "SELECT * FROM " .PREFIX."_users  WHERE usuario = '$usuario' AND senha = '$senha'";
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
	$query = "SELECT userkey FROM pp_users WHERE userkey = '$userkey' AND status = '1'";
	$retorno = mysqli_query($conn, $query);
	Fechar($conn);
	if (mysqli_num_rows($retorno) <= 0)
		return false;
	else
		return true;
}
 ?>
