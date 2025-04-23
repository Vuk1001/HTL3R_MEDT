<?php
require_once __DIR__.'/../vendor/autoload.php';
use Doctrine\DBAL\DriverManager;


$rootConnection = DriverManager::getConnection([
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'driver' => 'pdo_mysql'
]);


$rootConnection->executeStatement("CREATE DATABASE IF NOT EXISTS rps_tournament");
$rootConnection->close();

$connection = DriverManager::getConnection([
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'driver' => 'pdo_mysql',
    'dbname' => 'rps_tournament',
    'charset' => 'utf8mb4'
]);

$schemaSql = file_get_contents(__DIR__.'/schema.sql');
$connection->executeStatement($schemaSql);

echo "Database and tables created successfully!\n";
