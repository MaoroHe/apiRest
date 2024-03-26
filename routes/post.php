<?php
error_reporting(0);

    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    $requestMethod = $_SERVER['REQUEST_METHOD'];
    
    if ($requestMethod === 'POST')
    {
        require 'config/config.php';
        require 'controllers/blogController.php';

        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data)) {
            storePost($_POST);
        } else {
            storePost($data);
        }
    } else {
        $data = [
            'status' => 405,
            'message' => $requestMethod . ' Method not allowed',
        ];

        header("HTTP/1.0 405 Method not allowed");
        echo json_encode($data);
    }