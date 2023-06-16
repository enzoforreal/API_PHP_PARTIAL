<?php

function createTask(string $description): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createTaskQuery = $databaseConnection->prepare("
        INSERT INTO tasks (
            description
        ) VALUES (
            :description
        );
    ");

    $createTaskQuery->execute([
        "description" => htmlspecialchars($description)
    ]);
}
