<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../entities/articles/get-articles.php";

try {
    $articles = getArticles();

    echo jsonResponse(200, ["X-School" => "ESGI"], [
        "success" => true,
        "articles" => $articles
    ]);
} catch (Exception $exception) {
    echo jsonResponse(500, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}

