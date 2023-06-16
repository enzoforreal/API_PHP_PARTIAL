<?php

require_once __DIR__ . "/connection.php";

try {
    $databaseConnection = getDatabaseConnection();
    $databaseConnection->query("DROP TABLE IF EXISTS users;");
    $databaseConnection->query("DROP TABLE IF EXISTS tasks;");
    
    $databaseConnection->query("CREATE TABLE users (
                                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                    email VARCHAR(50) NOT NULL,
                                    password CHAR(60) NOT NULL,
                                    token CHAR(60) DEFAULT NULL
                                );");

    $databaseConnection->query("CREATE TABLE tasks (
                                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                    description TEXT NOT NULL
                                );");

    echo "Migration réussie" . PHP_EOL;
} catch (Exception $exception) {
    echo "Une erreur est survenue durant la migration des données" . PHP_EOL;
    echo $exception->getMessage();
}
