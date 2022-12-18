<?php

namespace Vinvit\MVC\Controllers;

use Vinvit\MVC\Core\Controller\Controller;
use Vinvit\MVC\Core\Attributes\Route;

class HomeController implements Controller {

    #[Route('get', '/')]
    public function index()
    {
        return "hello world";
    }

    #[Route('get', '/{id}',["id" => "[0-9]+"])]
    public function number(int $id = 0)
    {
        return "Number: " . $id;
    }
}