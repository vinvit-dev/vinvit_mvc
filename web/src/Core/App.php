<?php

namespace Vinvit\MVC\Core;

use Composer\Autoload\ClassLoader;
use Vinvit\MVC\Core\Controller\Controller;

class App {
    private $router;
    private $autoloader;

    public function __construct(ClassLoader $autoloader) {
       $this->autoloader = $autoloader;
       $this->router = new Router();

       $this->registerContollers();
    }

    public function registerContollers() {
        $this->router->registerControllers(AutoLoader::loadClassesImplementInterface($this->autoloader, Controller::class));
    }

    public function run() {
        echo $this->router->start();
    }
}