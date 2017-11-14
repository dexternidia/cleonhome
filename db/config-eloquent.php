<?php
namespace DB; 

use Illuminate\Database\Capsule\Manager as Capsule;
 
class Database {
	    function __construct() {
	    $capsule = new Capsule;
	    $capsule->addConnection([
	     'driver' => $_SERVER['ENV_DB_ADAPTER'],
	     'host' => $_SERVER['ENV_DB_HOST'],
	     'database' => $_SERVER['ENV_DB_DATABASE'],
	     'username' => $_SERVER['ENV_DB_USERNAME'],
	     'password' => $_SERVER['ENV_DB_PASSWORD'],
	     'charset' => 'utf8',
	     'collation' => 'utf8_unicode_ci',
	     'prefix' => '',
	    ]);
	    // Setup the Eloquent ORM… 
	    $capsule->bootEloquent();
	}
}

