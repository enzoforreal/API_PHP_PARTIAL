<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

require_once __DIR__ . "/libraries/path.php";
require_once __DIR__ . "/libraries/method.php";
require_once __DIR__ . "/libraries/response.php";

if (isPath("articles/:article")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/articles/getById.php";
        die();
    }

    if (isDeleteMethod()) {
        require_once __DIR__ . "/routes/articles/delete.php";
        die();
    }

    if (isPatchMethod()) {
        require_once __DIR__ . "/routes/articles/patch.php";
        die();
    }
}

if (isPath("articles")) {
    if (isGetMethod()) {
        require_once __DIR__ . "/routes/articles/get.php";
        die();
    }

    if (isPostMethod()) {
        require_once __DIR__ . "/routes/articles/post.php";
        die();
    }
}

echo jsonResponse(404, [], [
    "success" => false,
    "message" => "Route not found"
]);

require_once __DIR__ . "/routes/not-found/all.php";
