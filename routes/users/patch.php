<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/body.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/users/update-user.php";

try {
    $body = getBody();
    $parameters = getParametersForRoute("/users/:user");
    $id = $parameters["user"];

    updateArticle($id, $body);

    echo jsonResponse(200, [], [
        "success" => true,
        "message" => "User updated"
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
