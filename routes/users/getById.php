<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/users/get-userById.php";

$parameters = getParametersForRoute("/users/:user");

if (isset($parameters["user"])) {
    $userId = $parameters["user"];
    $user = getUserById($userId);

    if ($user === null) {
        echo jsonResponse(404, [], [
            "success" => false,
            "error" => "User not found"
        ]);
    } else {
        echo jsonResponse(200, ["X-School" => "ESGI"], [
            "success" => true,
            "user" => $user
        ]);
    }
} else {
    echo jsonResponse(404, [], [
        "success" => false,
        "message" => "Route not found"
    ]);
}
