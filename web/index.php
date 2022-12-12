<?php

use VinvitMVC\Core\Router;

require_once(__DIR__ . "/autoload.php");
require_once (__DIR__ . "/bootstrap.php");

$router = new Router();

$router->registerController([
    \VinvitMVC\Controllers\HomeController::class
]);

echo $router->start();