<?php
namespace Nicki\DoctrineDbal\Database;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;

class Connection
{
    private static $instance;

    public static function getInstance(): \Doctrine\DBAL\Connection
    {
        if (!self::$instance) {
            try {
                self::$instance = DriverManager::getConnection([
                    'dbname' => 'rps_tournament',
                    'user' => 'root',
                    'password' => '',
                    'host' => 'localhost',
                    'driver' => 'pdo_mysql',
                    'charset' => 'utf8mb4'
                ]);
            } catch (Exception $e) {
                throw new \RuntimeException('Database connection failed: ' . $e->getMessage());
            }
        }
        return self::$instance;
    }
}