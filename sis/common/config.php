<?php 

// DATOS DE CONEXIÓN A BD
define('HOST', 'localhost');
define('DATA_BASE', 'transporte_bd');
// define('USER_DB', 'hdc_kuyay_user');
// define('PASS_DB', 'Kuyay2018&%');
define('USER_DB', 'root');
define('PASS_DB', '');
// fin

// DATOS GENERALES
define('URL',basename($_SERVER['REQUEST_URI']));
define('SYS','promperu');//opciones: promperu ó externo
// fin

//DATOS SEND MAIL
define("MAIL_SECURE","ssl");
define("MAIL_HOST","mail.beerlandfactory.com");
define("MAIL_PORT","465");
define("MAIL_USER","paginaweb@beerlandfactory.com");
define("MAIL_USER_PASS","hdc2016%");
define("MAIL_ALTBODY","Mensaje de Intranet - Corapsac");

//FIN

// DATOS DE EMPRESA QUE DESARROLLA
define('EMP_NAME', 'PROYECTO DE ING. REQUISITOS');
define('EMP_SLOGAN', 'Tu web preferida');
define('EMP_FB','https://www.facebook.com/hdcperu/?fref=ts');
define('EMP_WEB','https://agenciahdc.com/');
// fin

// ANIMACIÓN INICIAL
define('BACKGROUND_GO', '#004d3e');
define('EMP_NAME_GO', '<b>PROYECTO DE ING. REQUISITOS</b>');
define('EMP_SLOGAN_GO', 'Tu web preferida');
define('BACKGROUND_END', '#fff');
define('COLOR_GO', '#fff');
define('COLOR_END', '#004d3e');
define('FONT_SIZE', '50px');
define('TIME_REDIRECT','3000');
// fin


// DATOS DE CLIENTE
define('CLI_NAME', 'Kuyay'); //HDC: NOMBRE DEL CLIENTE
// fin


// DATOS PARA LOGIN
define('SUPER_USER', '');
define('SUPER_PASS', '');
define('ADMIN_USER', 'admin');
define('ADMIN_PASS', 'admin');
define('TIPO_LOG', 'log_estatico'); # valores : 'log_estatico' ó 'log_dinamico'

#nombre de las sesiones que se crean para poder usarlas.
define('SES_ADMIN', 'ses-admin');# estáticos
define('SES_SUPERADMIN', 'ses-superadmin');# estáticos
define('SES_DATA', 'ses-data');# general->guarda datos de usuario

#nombres de usuario para sesiones estáticas
define('SES_USER_NAME','Administrador');
$bg = mt_rand(2,4);
define('IMG_FOUND','fondo'.$bg); # nombre de imagen de fondo de login
// fin

// Colores Default:
define('BG_HEADER', '#004d3e');
define('BG_BTN_HOME', '#000');
define('BG_BTN_HOMEHOVER','gray');
// define('BG_HEAD_LIST','#1e2ea1');
define('BG_HEAD_LIST','#232323');
?>