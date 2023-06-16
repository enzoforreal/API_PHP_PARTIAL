<?php

function deleteTask(string $id): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $deleteTaskQuery = $databaseConnection->prepare("DELETE FROM tasks WHERE id = :id");

    $deleteTaskQuery->execute([
        "id" => $id
    ]);
}
