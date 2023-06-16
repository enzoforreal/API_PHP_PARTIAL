<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once __DIR__ . "/libraries/path.php";
require_once __DIR__ . "/libraries/method.php";
require_once __DIR__ . "/libraries/response.php";

// Users Routes
if (isPath("users/:user")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/users/getById.php";
        die();
    }

    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/users/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/users/patch.php";
        die();
    }
}

if (isPath("users")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/users/get.php";
        die();
    }

    if (isPostMethod()) {
        require_once __DIR__ . "/routes/users/post.php";
        die();
    }
}

// Tasks Routes
if (isPath("tasks/:task")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/tasks/getById.php";
        die();
    }

    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/tasks/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/tasks/patch.php";
        die();
    }
}

if (isPath("tasks")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/tasks/get.php";
        die();
    }

    if (isPostMethod()) {
        require_once __DIR__ . "/routes/tasks/post.php";
        die();
    }
}

echo jsonResponse(404, [], [
    "success" => false,
    "message" => "Route not found"
]);

require_once __DIR__ . "/routes/not-found/all.php";
