<?php 	

// Banco de dados
define('SERVER', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DATABASE', 'spope');
define('CHARSET', 'utf8');
define('PREFIX', 'pp');

// urls
define('URL_BASE', 'localhost:8080/pope/');
define('URL_REGISTRO', URL_BASE.'registro.php');
define('URL_PAINEL', URL_BASE.'painel.php');

// dirs
define('DIR_BASE', $_SERVER['DOCUMENT_ROOT'].'/pope/');
define('DIR_SISTEMA', DIR_BASE.'sistema/');

// Arquivos
define('FILE_CONFIG', 'config.php');
define('FILE_HELPERS', DIR_SISTEMA.'helpers.php');
define('FILE_DATABASE', DIR_SISTEMA.'database.php');

?>

 