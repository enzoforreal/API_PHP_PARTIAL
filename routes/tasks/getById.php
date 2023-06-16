<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/tasks/get-taskById.php";

$parameters = getParametersForRoute("/tasks/:task");

if (isset($parameters["task"])) {
    $taskId = $parameters["task"];
    $task = getTaskById($taskId);

    if ($task === null) {
        echo jsonResponse(404, [], [
            "success" => false,
            "error" => "Task not found"
        ]);
    } else {
        echo jsonResponse(200, ["X-School" => "ESGI"], [
            "success" => true,
            "task" => $task
        ]);
    }
} else {
    echo jsonResponse(404, [], [
        "success" => false,
        "message" => "Route not found"
    ]);
}
