<?php

use Vinvit\MVC\Core\App;

$autoloader = require_once(__DIR__ . "/autoload.php");
require_once (__DIR__ . "/bootstrap.php");

$app = new App($autoloader);
$app->run();