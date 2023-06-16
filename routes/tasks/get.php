<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/tasks/get-tasks.php";


if ($tokenNotFound || $invalidToken) {
    echo jsonResponse(401, [], [
        "success" => false,
        "message" => "Provide an Authorization: Bearer token"
    ]);
} else {
    try {
      
        $tasks = getTasks();

        if (empty($tasks)) {
            
            echo jsonResponse(404, [], [
                "success" => false,
                "message" => "No tasks found"
            ]);
        } else {
            
            echo jsonResponse(200, [], [
                "success" => true,
                "tasks" => $tasks
            ]);
        }
    } catch (Exception $exception) {
        
        echo jsonResponse(500, [], [
            "success" => false,
            "error" => $exception->getMessage()
        ]);
    }
}
