<?php

namespace Vinvit\MVC\Controllers;

use Vinvit\MVC\Core\Controller\Controller;
use Vinvit\MVC\Core\Attributes\Route;
use Vinvit\MVC\Core\Controller\Response\TwigResponse;

class HomeController implements Controller {

    #[Route('get', '/')]
    public function index()
    {
        $response = new TwigResponse('home');
        return $response->getResponse();
    }

    #[Route('get', '/{id}',["id" => "[0-9]+"])]
    public function number(int $id = 0)
    {
        $response = new TwigResponse('home', ['num' => $id]);
        return $response->getResponse();
    }
}