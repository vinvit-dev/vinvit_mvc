<?php

namespace Vinvit\MVC\Core\Database;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;

class Database {
    private static Connection|null $connection = null;

    public static function initConnection(): void
    {
        $connectionParams = [
            'dbname' => getenv("DB_NAME"),
            'user' => getenv("DB_USER"),
            'password' => getenv("DB_PASSWORD"),
            'host' => getenv("DB_HOST"),
            'driver' => getenv("DB_DRIVER") ?: 'pdo_mysql',
        ];
        try {
            self::$connection = DriverManager::getConnection($connectionParams);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public static function getConnection(): ?Connection
    {
        if(self::$connection === null) {
            self::initConnection();
        }
        return self::$connection;
    }
}