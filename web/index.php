<?php

use VinvitMVC\Core\Router;

require_once(__DIR__ . "/autoload.php");
require_once (__DIR__ . "/bootstrap.php");

$router = new Router();
$router->get('/', 'index');

echo $router->resolve($_SERVER['REQUEST_URI'], $_SERVER["REQUEST_METHOD"]);

function index() {
    return "Hello world!";
}