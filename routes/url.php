<?php 

    $method = $_SERVER['REQUEST_METHOD'];
    $uri = $_SERVER['REQUEST_URI'];

    $url = rtrim($uri, '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);