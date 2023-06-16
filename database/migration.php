<?php

require_once __DIR__ . "/connection.php";

try {
    $databaseConnection = getDatabaseConnection();
    $databaseConnection->query("DROP TABLE IF EXISTS articles;");
    $databaseConnection->query("CREATE TABLE articles (
                                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                                    title VARCHAR(50) NOT NULL,
                                    body TEXT NOT NULL
                                );");

    echo "Migration réussie" . PHP_EOL;
} catch (Exception $exception) {
    echo "Une erreur est survenue durant la migration des données" . PHP_EOL;
    echo $exception->getMessage();
}
