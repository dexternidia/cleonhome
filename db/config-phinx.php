<?php
require_once 'vendor/autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__,'../.env');
$dotenv->load();
require('config/define/execute.php');
return [
  'paths' => [
    'migrations' => 'db/migrations',
    'seeds' => 'db/seeds'
  ],
  //'migration_base_class' => '\Migrations\Migration\Migration',
  'environments' => [
    'default_migration_table' => 'phinxlog',
    'default_database' => 'dev',
    'dev' => [
      'adapter' => $_SERVER['ENV_DB_ADAPTER_PHINX'],
      'host' => $_SERVER['ENV_DB_HOST'],
      'name' => $_SERVER['ENV_DB_DATABASE'],
      'user' => $_SERVER['ENV_DB_USERNAME'],
      'pass' => $_SERVER['ENV_DB_PASSWORD'],
      'port' => $_SERVER['ENV_DB_PORT']
    ]
  ]
];	
