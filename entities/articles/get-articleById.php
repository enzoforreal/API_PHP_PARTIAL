<?php

function getArticleById(string $id): ?array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getArticleQuery = $databaseConnection->prepare("SELECT * FROM articles WHERE id = :id;");
    $getArticleQuery->execute(["id" => $id]);
    $article = $getArticleQuery->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        return null;
    }

    return $article;
}

