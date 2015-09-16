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
		echo "Validará";
	}
}

function validaLogin(){
	if(!!getPost('send')){
			echo "Validará";
	}	
}


 ?>