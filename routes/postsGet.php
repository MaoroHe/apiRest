<?php

    require 'config/config.php';    
    require 'routes/url.php';
    require 'controllers/GetAllController.php';

    $requestMethod = $_SERVER['REQUEST_METHOD'];

    if (@$url[2] === 'posts') {
        echo json_encode((new GetAllController())->getAll());
    } else if (@$url[2] === 'post' && is_numeric(@$url[3]) && isset($url[3])) {
        if ($requestMethod === 'GET') {
            echo json_encode((new GetAllController())->getOne($url[3]));
        } else if ($requestMethod === 'DELETE') {
            require 'routes/delete.php';
        } else if ($requestMethod === 'PATCH') {
            require 'routes/update.php';
        }
    } else if (@$url[2] === 'post') {
        require 'routes/post.php';
    } else {
        echo json_encode(array("message" => "404"));
    }
