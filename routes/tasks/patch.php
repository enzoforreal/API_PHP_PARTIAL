<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/tasks/update-task.php";

try {
    $body = getBody();
    $parameters = getParametersForRoute("/tasks/:task");
    $id = $parameters["task"];

    updateTask($id, $body);

    echo jsonResponse(200, [], [
        "success" => true,
        "message" => "Task updated"
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
