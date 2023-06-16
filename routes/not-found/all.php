<?php

require_once __DIR__ . "/../../libraries/response.php";

echo jsonResponse(200, [], [
    "success" => true,
    "message" => "Hello, world!"
]);
