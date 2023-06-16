<?php

function deleteArticle(string $id): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $deleteArticleQuery = $databaseConnection->prepare("DELETE FROM articles WHERE id = :id");

    $deleteArticleQuery->execute([
        "id" => $id
    ]);
}

