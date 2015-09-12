<?php 	

// Banco de dados
define('SERVER', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DATABASE', 'usuarios');
define('DATABASE_QUESTOES', 'questoes');
define('DATABASE_LISTAS', 'listas');
define('CHARSET', 'utf8');
define('PREFIX', 'pope');

// urls
define('URL_BASE', 'localhost:8080/pope/');
define('URL_REGISTRO', URL_BASE.'registro.php');
define('URL_PAINEL', URL_BASE.'painel.php')

// dirs
define('DIR_BASE', $_SERVER['DOCUMENT_ROOT'].'/pope/');
define('DIR_SISTEMA', DIR_BASE.'sistema/');

// Arquivos
define('FILE_CONFIG', 'config.php');
define('FILE_FUNCOES', 'funcoes.php');
define('FILE_FUNC_DB', 'database.php');
 ?>