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

	if(!file_exists(FILE_VISUAIS))
			die('Error: Arquivo visuais.php não existe');
		else
			require_once FILE_VISUAIS;	
	logout();
}

function validaCadastro(){
	if(!!getPost('submit') && file_exists(FILE_MCONFIG)){
		require_once(FILE_MCONFIG);

		// Mensagem de erro
		$mensagem = array(
				"inputNome" => array(
					"msg"		=> null,
					"existe"	=> false 
				),

				"inputEmail" => array(
					"msg"		=> null,
					"existe"	=> false
				),

				"inputMatr" => array(
					"msg"		=> null,
					"existe"	=> false
				),

				"inputUsuario" => array(
					"msg"		=> null,
					"existe"	=> false
				),

				"inputSenha" => array(
					"msg"		=> null,
					"existe"	=> false
				),

				"inputTicket" => array(
					"msg"		=> null,
					"existe"	=> false
				),
			)

		// Recupera informações do POST
		
		// Infos Pessoais
		$nome = getPost('nome');
		$email = getPost('mail');
		$cemail = getPost('cmail');
		$matr = getPost('matricula');

		// Infos da conta
		$usuario = getPost('usuario');
		$senha = getPost('senha');
		$csenha = getPost('csenha');
		$ticket = getPost('ticket');

		//Teste de REGEX
		if(!filter_var($mail, FILTER_VALIDATE_EMAIL))


	}
}

function validaLogin(){
	if(!!getPost('logar')){
			$message = null;
			$usuario = getPost('usuario');
			$senha = getPost('senha');
			if(!verificaLogin($usuario, $senha))
				$message = "<p class='erro-msg'>Nome de usuário ou senha incorretos.</p>";
			else
				criaSessao($usuario, $senha);
			echo ($message != null) ? $message : null;
	}	
}


 ?>