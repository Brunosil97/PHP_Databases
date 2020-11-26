<?php
// bootstrap.php
require_once "vendor/autoload.php";

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$paths = array(__DIR__."/src");
$isDevMode = true;
$proxyDiv = null;
$cache = null;
$useSimpleAnnotationReader = false;
$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, $proxyDiv, $cache, $useSimpleAnnotationReader);

// the connection configuration
$dbParams = array(
    'dbname'   => 'ORMtestdb',
    'user'     => 'root',
    'password' => 'Marinasil87',
    'host'     => 'localhost',
    'driver'   => 'pdo_mysql'
);

//database configuration parameters -> using MySQL
$conn = \Doctrine\DBAL\DriverManager::getConnection($dbParams);
//obtaining the entity Manager
$entityManager = EntityManager::create($conn, $config);