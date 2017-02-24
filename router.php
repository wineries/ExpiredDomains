<?php
require_once(__DIR__ . '/vendor/autoload.php');

$_SERVER['DOCUMENT_ROOT'] = $_SERVER['DOCUMENT_ROOT'] . '/public';

if(substr($_SERVER['REQUEST_URI'], 0, 8) == '/assets/'){
    header('Content-type:');
    readfile($_SERVER['DOCUMENT_ROOT'] . $_SERVER['REQUEST_URI']);
}else{
    $router = new Gears\Router();
    $router->routesPath = __DIR__ . '/routes.php';
    $router->dispatch();
}