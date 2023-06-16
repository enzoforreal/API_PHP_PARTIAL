<?php

function getUserById(string $id): ?array
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();
    $getUserQuery = $databaseConnection->prepare("SELECT * FROM users WHERE id = :id;");
    $getUserQuery->execute(["id" => $id]);
    $user = $getUserQuery->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        return null;
    }

    return $user;
}
