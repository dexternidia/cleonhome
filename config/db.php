<?php
/*--------------------------------------------------------------
Datos de conección de la Base de Datos
--------------------------------------------------------------*/

/* Define el tipo de Driver Universal a usar ejemplo: Mysql, SQLite */
$adapter = $_SERVER['ENV_DB_ADAPTER'];

/* Adaptador para las migraciones PHINX */
$adapter_Phinx = $_SERVER['ENV_DB_ADAPTER_PHINX'];

/* Adaptador para el ORM  DOCTRINE */
$adapter_Doctrine = $_SERVER['ENV_DB_ADAPTER_DOCTRINE'];

/*El nombre del host ejemplo: www.gobmvc.com.ve, localhost */
$host = $_SERVER['ENV_DB_HOST'];

/* El nombre del host ejemplo: www.gobmvc.com.ve, localhost */
$dbname = $_SERVER['ENV_DB_DATABASE'];

/* Nombre de Usario  */
$user = $_SERVER['ENV_DB_USERNAME'];

/* Clave del motor SQL */
$password = $_SERVER['ENV_DB_PASSWORD'];

/* Puerto del motor SQL */
$port=$_SERVER['ENV_DB_PORT'];

  