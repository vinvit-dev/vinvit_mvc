<?php

namespace Vinvit\MVC\Core\Response;


use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class TwigResponse implements Response {


    public static function getResponse(string $template_name, array $settings = [])
    {
        $loader = new FilesystemLoader('./templates/');
        $twig = new Environment($loader);
        try {
            return  $twig->render($template_name. ".html.twig", $settings);
        } catch (LoaderError|SyntaxError|RuntimeError $e) {
            return $e->getMessage();
        }
    }
}
