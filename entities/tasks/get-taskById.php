<?php

function getTaskById(string $id): ?array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getTaskQuery = $databaseConnection->prepare("SELECT * FROM tasks WHERE id = :id;");
    $getTaskQuery->execute(["id" => $id]);
    $task = $getTaskQuery->fetch(PDO::FETCH_ASSOC);

    if (!$task) {
        return null;
    }

    return $task;
}
