<?php
require_once __DIR__ . "/../../libraries/utilities.php";
require_once __DIR__ . "/../../database/connection.php";

function loginUser(string $email, string $password): ?string
{
    $databaseConnection = getDatabaseConnection();
    $getUserQuery = $databaseConnection->prepare("SELECT * FROM users WHERE email = :email;");
    $getUserQuery->execute(["email" => $email]);
    $user = $getUserQuery->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($password, $user['password'])) {
        return null; // L'email ou le mot de passe est incorrect
    }

    // Générez et renvoyez le jeton de connexion ici
    $token = generateToken();

    return $token;
}

function generateToken(): string
{
    // Générez le jeton de connexion ici
    $token = "votre_token";

    return $token;
}
