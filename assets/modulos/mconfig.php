<?php 

Init();
function Init(){
	session_start();
	$config_file = $_SERVER['DOCUMENT_ROOT']."/pope/sistema/config.php";

	if(file_exists($config_file))
		require_once($config_file);
	else
		die("Erro: Arquivo de configuração não existe.");

	if(file_exists(FILE_HELPERS))
		require_once(FILE_HELPERS);
	else
		die("Erro: Arquivo helpers não exste.");

	if(file_exists(FILE_DATABASE))
		require_once(FILE_DATABASE);
	else
		die("Erro: Arquivo database não existe.");

	logout();

}
?>