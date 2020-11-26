<?php
require_once "bootstrap.php";

//returns to the tools needed to create database schema
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);
?>

<?php
// cli-config.php
