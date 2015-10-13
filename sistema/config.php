<?php 	

// Banco de dados
define('SERVER', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DATABASE', 'spope');
define('CHARSET', 'utf8');
define('PREFIX', 'pp');

// url
define('URL_BASE', 'http://localhost:8080/pope/');
define('URL_REGISTRO', URL_BASE.'registro/');
define('URL_PAINEL', URL_BASE.'painel.php');
define('URL_CHECK_DISP', URL_BASE.'assets/modulos/register_check_disp.php');
define('URL_CSS', URL_BASE.'assets/css/main.css');
define('URL_JS', URL_BASE.'assets/js/custom.js');
define('URL_FONT', URL_BASE.'assets/css/font-awesome.min.css');

// dirs
define('DIR_BASE', $_SERVER['DOCUMENT_ROOT'].'/pope/');
define('DIR_SISTEMA', DIR_BASE.'sistema/');
define('DIR_MODULOS', DIR_BASE.'assets/modulos/');
define('DIR_PARCIAIS', DIR_BASE.'assets/parciais/');


// Arquivos
define('FILE_CONFIG', 'config.php');
define('FILE_HELPERS', DIR_SISTEMA.'helpers.php');
define('FILE_DATABASE', DIR_SISTEMA.'database.php');
define('FILE_VISUAIS', DIR_SISTEMA.'visuais.php');
define('FILE_HEAD', DIR_BASE.'assets/parciais/head.php');

// Modulos
define('FILE_MCONFIG', DIR_BASE.'assets/modulos/mconfig.php');
define('FILE_REGEX', DIR_MODULOS.'regex.php');
?>

 