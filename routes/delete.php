<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod === 'DELETE')
{
    require 'config/config.php';
    require 'routes/url.php';
    require 'controllers/blogController.php';

    $urlId = $url[3];

    if (!empty($urlId))
    {
        deletePost($urlId);

        $data = [
            'status' => 200,
            'message' => 'Successfully deleted',
        ];

        header("HTTP/1.0 200 Deleted");
        echo json_encode($data);
    }
} else {
    $data = [
        'status' => 405,
        'message' => $requestMethod . ' Method not allowed',
    ];

    header("HTTP/1.0 405 Method not allowed");
    echo json_encode($data);
}