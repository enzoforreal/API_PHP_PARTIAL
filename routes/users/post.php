<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../entities/users/create-user.php";
require_once __DIR__ . "/../../entities/users/login-user.php";

// Vérifier le chemin de la requête
if (isPath("login")) {
    try {
        $body = getBody();

        // Appeler la fonction de connexion de l'entité "users"
        $token = loginUser($body["email"], $body["password"]);

        if ($token === null) {
            // L'email ou le mot de passe est incorrect
            echo jsonResponse(400, [], [
                "success" => false,
                "message" => "Bad email or password"
            ]);
        } else {
            // Connexion réussie
            echo jsonResponse(200, [], [
                "success" => true,
                "token" => $token
            ]);
        }
    } catch (Exception $exception) {
        // Gérer les exceptions
        echo jsonResponse(500, [], [
            "success" => false,
            "error" => $exception->getMessage()
        ]);
    }
} elseif (isPath("register")) {
    try {
        $body = getBody();

        // Appeler la fonction de création de l'entité "users"
        createUser($body["email"], $body["password"], $body["token"]);

        echo jsonResponse(200, [], [
            "success" => true,
            "message" => "User created"
        ]);
    } catch (Exception $exception) {
        // Gérer les exceptions
        echo jsonResponse(500, [], [
            "success" => false,
            "error" => $exception->getMessage()
        ]);
    }
} else {
    // Route non trouvée
    echo jsonResponse(404, [], [
        "success" => false,
        "message" => "Route not found"
    ]);
}


