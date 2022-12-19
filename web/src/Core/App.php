<?php

namespace Vinvit\MVC\Core;

use Composer\Autoload\ClassLoader;
use Doctrine\DBAL\Connection;
use ReflectionException;
use Vinvit\MVC\Core\Controller\Controller;
use Vinvit\MVC\Core\Database\Database;

class App
{
    private Router $router;
    private ClassLoader $autoloader;
    protected static Connection|null $dbConnection;

    public function __construct(ClassLoader $autoloader)
    {
        $this->autoloader = $autoloader;
        $this->router = new Router();

        $this->registerControllers();

        self::$dbConnection = Database::getConnection();
    }

    public function registerControllers(): void
    {
        try {
            $this->router->registerControllers(AutoLoader::loadClassesImplementInterface($this->autoloader, Controller::class));
        } catch (ReflectionException $e) {
            echo $e->getMessage();
        }
    }

    public function run(): void
    {
        $this->router->start();
    }
}