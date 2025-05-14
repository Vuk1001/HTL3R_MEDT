<?php
require_once __DIR__.'/../vendor/autoload.php';
use Doctrine\DBAL\DriverManager;

$connection = DriverManager::getConnection([
    'host' => 'localhost',
    'user' => 'root',
    'password' => '',
    'driver' => 'pdo_mysql',
    'dbname' => 'rps_tournament',
    'charset' => 'utf8mb4'
]);

if (!$connection->createSchemaManager()->tablesExist(['game_rounds'])) {
    $schemaSql = file_get_contents(__DIR__.'/schema.sql');
    $connection->executeStatement($schemaSql);
    echo "Database table created successfully!\n";
}
