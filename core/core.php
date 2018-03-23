<?php
/*
  EL NÚCLEO DE LA APLICACIÓN!
*/

session_start();

#Constantes de conexión
define('DB_HOST','localhost');
define('DB_USER','tesis_charcuteri');
define('DB_PASS','tesis_tesis');
define('DB_NAME','ocrendbb');

#Constantes de la APP
define('HTML_DIR','html/');
define('APP_TITLE','Prodicar Zulia 2015 C.A');
define('APP_COPY','Copyright &copy; ' . date('Y',time()) . ' Casa Italiana.');
define('APP_URL','doctype.ddns.net');

#Constantes de PHPMailer
define('PHPMAILER_HOST','p3plcpnl0689.prod.phx3.secureserver.net');
define('PHPMAILER_USER','tickets@ticketiin.com');
define('PHPMAILER_PASS','123456789asd');
define('PHPMAILER_PORT',465);

#Estructura
require('vendor/autoload.php');
require('core/models/class.Conexion.php');
require('core/bin/functions/Encrypt.php');
require('core/bin/functions/Users.php');
require('core/bin/functions/Categorias.php');
require('core/bin/functions/EmailTemplate.php');
require('core/bin/functions/LostpassTemplate.php');
require('core/bin/functions/PizzaTam.php');
require('core/bin/functions/DatosPersonales.php');
require('core/bin/functions/Compra.php');


$_users = Users();
$_categorias = Categorias();
$_pizzatam = PizzaTam();
$_users2 = DatosPersonales();
$_compra = Compra();

?>
