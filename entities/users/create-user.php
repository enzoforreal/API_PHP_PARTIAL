<?php

function createUser(string $email, string $password, ?string $token): void
{
    require_once __DIR__ . "/../../database/connection.php";

    $databaseConnection = getDatabaseConnection();

    $createUserQuery = $databaseConnection->prepare("
        INSERT INTO users (
            email,
            password,
            token
        ) VALUES (
            :email,
            :password,
            :token
        );
    ");

    $createUserQuery->execute([
        "email" => htmlspecialchars($email),
        "password" => htmlspecialchars($password),
        "token" => htmlspecialchars($token)
    ]);
}
