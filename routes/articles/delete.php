<?php

require_once __DIR__ . "/../../libraries/response.php";
require_once __DIR__ . "/../../libraries/parameters.php";
require_once __DIR__ . "/../../entities/articles/delete-article.php";

try {
    $parameters = getParametersForRoute("/articles/:article");
    $id = $parameters["article"];
    deleteArticle($id);

    echo jsonResponse(200, [], [
        "success" => true,
        "message" => "Article deleted"
    ]);
} catch (Exception $exception) {
    echo jsonResponse(200, [], [
        "success" => false,
        "error" => $exception->getMessage()
    ]);
}
