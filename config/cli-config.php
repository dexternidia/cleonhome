<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project bootstrap
require_once "db/config-doctrine.php";

// replace with mechanism to retrieve EntityManager in your app
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);