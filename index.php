<?php

header('Access-Control-Allow-Origin: *');
header('Acces-Control-Allow-Methods: GET, POST, PUT, DELETE');

// db includes
    include 'config/config.php';

// routes includes

// controllers


$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$url = rtrim($uri, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

print_r($url);