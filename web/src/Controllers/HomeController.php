<?php

namespace VinvitMVC\Controllers;

use VinvitMVC\Core\Controller\ControllerInterface;
use VinvitMVC\Core\Attributes\Route;

class HomeController implements ControllerInterface {

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