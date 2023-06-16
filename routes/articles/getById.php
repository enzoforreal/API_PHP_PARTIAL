<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/articles/get-articleById.php";

$parameters = getParametersForRoute("/articles/:article");

if (isset($parameters["article"])) {
    $articleId = $parameters["article"];
    $article = getArticleById($articleId);

    if ($article === null) {
        echo jsonResponse(404, [], [
            "success" => false,
            "error" => "Article not found"
        ]);
    } else {
        echo jsonResponse(200, ["X-School" => "ESGI"], [
            "success" => true,
            "article" => $article
        ]);
    }
} else {
    echo jsonResponse(404, [], [
        "success" => false,
        "message" => "Route not found"
    ]);
}

