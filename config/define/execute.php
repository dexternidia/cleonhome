<?php
require('./config/config.php');
require('./config/db.php');

/*
---------------------------------------------------------------
Definiendo las constantes
---------------------------------------------------------------
*/

if($baseUrl)
{
	define('baseUrl',$baseUrl);
}
else
{
	define('baseUrl','');
}

if ($ClaseDefault and $metodoDefault) 
{
	define('ClaseDefault',$ClaseDefault);
	define('metodoDefault',$metodoDefault);
}
else
{
	define('ClaseDefault','');
	define('metodoDefault','');
}

if($sessionNameDefault)
{
	define('sessionNameDefault', $sessionNameDefault);
}
else
{
	define('sessionNameDefault', '');
}

define('DB_ADAPTER_DOCTRINE', $adapter_Doctrine);
define('DB_ADAPTER_PHINX', $adapter_Phinx);
//ADAPTADOR UNIVERSAL
define('DB_ADAPTER', $adapter);
define('DB_HOST', $host);
define('DB_NAME', $dbname);
define('DB_USER', $user);
define('DB_PASSWORD', $password);
define('DB_PORT', $port);

//COMANDOS ESPECIALES HTML
define('TOKEN_FIELD', '<input type="hidden" name="<?= Token::id() ?>" value="<?= Token::get() ?>" />');

