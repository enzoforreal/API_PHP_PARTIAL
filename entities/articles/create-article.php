<?php

function createArticle(string $title, string $body): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createArticleQuery = $databaseConnection->prepare("
        INSERT INTO articles(
            title,
            body
        ) VALUES (
            :title,
            :body
        );
    ");

    $createArticleQuery->execute([
        "title" => htmlspecialchars($title),
        "body" => htmlspecialchars($body)
    ]);
}
