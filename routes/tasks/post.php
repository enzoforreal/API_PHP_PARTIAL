<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../entities/tasks/create-task.php";


if ($tokenNotFound || $invalidToken) {
    echo jsonResponse(401, [], [
        "success" => false,
        "message" => "Provide an Authorization: Bearer token"
    ]);
} else {
    try {
        
        $body = getBody();

        
        if (!isset($body["description"])) {
            echo jsonResponse(400, [], [
                "success" => false,
                "message" => "Description not found"
            ]);
        } else {
            
            createTask($body["description"]);

            echo jsonResponse(200, [], [
                "success" => true,
                "message" => "Task created"
            ]);
        }
    } catch (Exception $exception) {
        
        echo jsonResponse(500, [], [
            "success" => false,
            "error" => $exception->getMessage()
        ]);
    }
}
