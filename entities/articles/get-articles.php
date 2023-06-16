<?php

function getArticles(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getArticlesQuery = $databaseConnection->query("SELECT * FROM articles;");
    return $getArticlesQuery->fetchAll(PDO::FETCH_ASSOC);
}
