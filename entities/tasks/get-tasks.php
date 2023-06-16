<?php

function getTasks(): array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getTasksQuery = $databaseConnection->query("SELECT * FROM tasks;");
    return $getTasksQuery->fetchAll(PDO::FETCH_ASSOC);
}
