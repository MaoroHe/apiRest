<?php

$requestMethod = $_SERVER['REQUEST_METHOD'];

if ($requestMethod === 'PATCH') {
    require 'config/config.php';
    require 'routes/url.php';
    require 'controllers/blogController.php';

    $urlId = isset($url[3]) ? $url[3] : null;

    if (!empty($urlId))
    {
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data)) {
            updatePost($_POST, $urlId);
        } else {
            updatePost($data, $urlId);
        }
        
        $responseData = [
            'status' => 200,
            'message' => 'Successfully updated',
        ];

        header("HTTP/1.0 200 Updated");
        echo json_encode($responseData);
    } else {
        $responseData = [
            'status' => 400,
            'message' => 'Invalid request. Blog post ID not provided',
        ];

        header("HTTP/1.0 400 Bad Request");
        echo json_encode($responseData);
    }
} else {
    $responseData = [
        'status' => 405,
        'message' => $requestMethod . ' Method not allowed',
    ];

    header("HTTP/1.0 405 Method not allowed");
    echo json_encode($responseData);
}
