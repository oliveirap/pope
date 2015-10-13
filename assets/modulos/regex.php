<?php
	function validarUsuario($usuario){
		$regex = "/^[a-zA-Z0-9_@%#$&!.-]{3,16}$/";
		return preg_match($regex, $usuario);
	}
	function validarSenha($senha){
		$regex = "/^[a-z0-9A-Z_@%$#&!.-]{6,}$/";
		return preg_match($regex, $senha);
	}
	function validarTicket($ticket){
		$regex = "/^[a-z0-9A-Z]{6}$/";
		return preg_match($regex, $ticket);
	}
	function validarNome($nome){
		$regex = "/^[a-zA-Z0-9]{11,}$/";
		return preg_match($regex, $nome);
	}
	function validarMatr($matr){
		$regex = "/^[0-9]{14}$/";
		return preg_match($regex, $matr);
	}
	function validarEmail($email){
		$regex = "/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/";
		return preg_match($regex, $email);
	}
?>