<?php

namespace VinvitMVC\Core;

use Composer\Autoload\ClassLoader;
use VinvitMVC\Core\Controller\ControllerInterface;

class App {
    private $router;
    private $autoloader;

    public function __construct(ClassLoader $autoloader) {
       $this->autoloader = $autoloader;
       $this->router = new Router();

       $this->registerContollers();
    }

    public function registerContollers() {
        $this->router->registerControllers(Loader::loadClassesImplementInterface($this->autoloader, ControllerInterface::class));
    }

    public function run() {
        echo $this->router->start();
    }
}