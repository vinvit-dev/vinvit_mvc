<?php

namespace Vinvit\MVC\Controllers;

use Vinvit\MVC\Core\Attributes\Route;
use Vinvit\MVC\Core\Controller\ControllerBase;
use Vinvit\MVC\Core\Response\TwigResponse;

class HomeController extends ControllerBase {

    #[Route('get', '/')]
    public function index(): string
    {
        return $this->render('home');
    }

    #[Route('get', '/{id}',["id" => "[0-9]+"])]
    public function number(int $id = 0): string
    {
        return $this->render('home', ['num' => $id]);
    }
}