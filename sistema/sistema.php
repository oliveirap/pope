<?php 

Init();

function Init(){
	session_start();

	$config_file = $_SERVER['DOCUMENT_ROOT']."/pope/sistema/config.php";

	// chama config
	if(file_exists($config_file))
		require_once($config_file);
	else
		die("Error: Config File não existe");
	
	// chama helpers
	if(file_exists(FILE_HELPERS))
		require_once(FILE_HELPERS);
	else		
		die("ERROR: Arquivo helpers não existe");

	// chama database
	if(file_exists(FILE_DATABASE))
		require_once(FILE_DATABASE);
	else
		die("ERROR: Arquivo database não existe");	
	logout();
}

function validaCadastro(){
	if(!!getPost('send')){

		$message = null;
		$nome = getPost('nome');
		$email = getPost('email');
		$cemail = getPost('confirmaEmail');
		$usuario = getPost('usuario');
		$senha = getPost('senha');
		$csenha = getPost('confirmaSenha');
		$matricula = getPost('matricula');
		
		if($email != $cemail)
			$message = "E-mails não são iguais";
		else if($senha != $csenha)
			$message = "Senhas diferentes";
		else{
			if(emailExiste($email, 'users'))
				$message .= "E-mail já cadastrado. ";
			else if(loginExiste($usuario, 'users'))
				$message .= "Usuário já cadastrado. ";
			else if(matriculaExiste($matricula, 'users'))
				$message .= "matricula já cadastrada. ";
			else{
				if(cadastraUsuario($nome, $email, $usuario, $senha, $matricula))
					$message = "Cadastrado com sucesso.";
				else
					$message = "Erro ao cadastrar.";
			}
		}

		echo ($message != null) ? $message : null;
	}
}

function validaLogin(){
	if(!!getPost('send')){
			echo "Validará";
	}	
}


 ?>