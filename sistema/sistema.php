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
	if(!!getPost('submit')){
		if(file_exists(FILE_REGEX)){
			require_once(FILE_REGEX);
			$erromsg = "Inicial";
			// Mensagem de erro
			$erros = false;
			$mensagem = array(
					"inputNome" => array(
						"msg"		=> null,
						"existe"	=> false 
					),

					"inputEmail" => array(
						"msg"		=> null,
						"existe"	=> false
					),

					"inputCmail" => array(
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
					)
				);

			// Recupera informações do POST
			
			// Infos Pessoais
			$nome = getPost('nome');
			$nome = str_replace(" ", "", $nome);
			$email = getPost('email');
			$cemail = getPost('cemail');
			$matr = getPost('matricula');

			// Infos da conta
			$usuario = getPost('usuario');
			$senha = getPost('senha');
			$csenha = getPost('csenha');
			$ticket = getPost('ticket');

			//regex
			//Teste de Nome
			if(!validarNome($nome)){
				$mensagem['inputNome']['msg'] = "O nome deve conter pelo menos 11 carácteres.";
				$mensagem['inputNome']['existe'] = true;
				$erros = true;
			}

			//Teste de email
			if(!validarEmail($email)){
				$mensagem['inputEmail']['msg'] = "E-mail inválido.";
				$mensagem['inputEmail']['existe'] = true;
				$erros = true;
			}
			else if(!!emailExiste($email, "users")){
					$mensagem['inputEmail']['msg'] = "E-mail já cadastrado.";
					$mensagem['inputEmail']['existe'] = true;
					$erros = true;
			}

			if($email != $cemail){
				$mensagem['inputCmail']['msg'] = "E-mails diferentes.";
				$mensagem['inputCmail']['existe'] = true;
				$erros = true;
			}

			// Teste de Matricula
			if($matr == ""){
				$mensagem['inputMatr']['msg'] = "Por favor, digite sua matricula.";
				$mensagem['inputMatr']['existe'] = true;
				$erros = true;
			}
			else if(!validarMatr($matr)){
					$mensagem['inputMatr']['msg'] = "Matrícula não reconhecida.";
					$mensagem['inputMatr']['existe'] = true;
					$erros = true;
			}
			else if(!!matriculaExiste($matr, "users")){
					$mensagem['inputMatr']['msg'] = "Matricula já cadastrada";
					$mensagem['inputMatr']['existe'] = true;
					$erros = true;
			}

			// Teste de Usuario
			if(!validarUsuario($usuario)){
				$mensagem['inputUsuario']['msg'] = "Usuário inválido.";
				$mensagem['inputUsuario']['existe'] = true;
				$erros = true;
			}
			else if(!!loginExiste($usuario, "users")){
				$mensagem['inputUsuario']['msg'] = "Usuário já cadastrado.";
				$mensagem['inputUsuario']['existe'] = true;
				$erros = true;			
			}

			//Teste de senha
			if (!validarSenha($senha)) {
				$mensagem['inputSenha']['msg'] = "Senha inválida.";
				$mensagem['inputSenha']['existe'] = true;
				$erros = true;
			}

			// Teste de Ticket
			if(!validarTicket($ticket)){
				$mensagem['inputTicket']['msg'] = "Formato de ticket inválido.";
				$mensagem['inputTicket']['existe'] = true;
				$erros = true;
			}
			else if(!ticketDisp($ticket, "tickets")){
				$mensagem['inputTicket']['msg'] = "Ticket indisponível.";
				$mensagem['inputTicket']['existe'] = true;
				$erros = true;
			}

			if($erros){
				$erromsg = "<div class='msg error'><p>Erro ao cadastrar.</p>";
				foreach($mensagem as $row => $errocamp){
					$msg = $errocamp['msg'];
					if($errocamp['existe']){
						$erromsg.="<p>".$msg."</p>";
					}
				}
				$erromsg .= "</div>";
			}
			else{
				$retorno = cadastraUsuario($nome, $email, $usuario, $senha, $matr, $ticket);
				if(!!$retorno)
					$erromsg = "<div class='msg sucesso'>Cadastrado com sucesso.</div>";				
			}
			return $erromsg;
		}
		else{
			die("Erro no sistema.");
		}
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