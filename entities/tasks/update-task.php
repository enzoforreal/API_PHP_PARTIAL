<?php

function updateTask(string $id, array $columns): void
{
    if (count($columns) === 0) {
        return;
    }

    require_once __DIR__ . "/../../database/connection.php";

    $authorizedColumns = ["description"];

    $set = [];

    $sanitizedColumns = [
        "id" => htmlspecialchars($id)
    ];

    foreach ($columns as $columnName => $columnValue) {
        if (!in_array($columnName, $authorizedColumns)) {
            continue;
        }

        $set[] = "$columnName = :$columnName";

        $sanitizedColumns[$columnName] = htmlspecialchars($columnValue);
    }

    $set = implode(", ", $set);

    $databaseConnection = getDatabaseConnection();
    $updateTaskQuery = $databaseConnection->prepare("UPDATE tasks SET $set WHERE id = :id;");
    $updateTaskQuery->execute($sanitizedColumns);
}
