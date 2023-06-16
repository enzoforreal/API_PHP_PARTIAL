<?php
require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/tasks/delete-task.php";

if ($tokenNotFound || $invalidToken) {
    echo jsonResponse(401, [], [
        "success" => false,
        "message" => "Provide an Authorization: Bearer token"
    ]);
} else {
    
    $parameters = getParametersForRoute("/tasks/:task");
    $taskId = $parameters["task"];

    try {
        
        deleteTask($taskId);

        echo jsonResponse(200, [], [
            "success" => true,
            "message" => "Task deleted"
        ]);
    } catch (Exception $exception) {
        
        echo jsonResponse(500, [], [
            "success" => false,
            "error" => $exception->getMessage()
        ]);
    }
}
