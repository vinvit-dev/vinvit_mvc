<?php

namespace Vinvit\MVC\Core\Controller\Response;


use http\QueryString;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class TwigResponse implements Response {
    private string $response;
    /**
     * @param string $template_name
     * Name of template without file extension.
     * @param array $settings
     * Array of template variables, settings.
     */
    public function __construct(string $template_name, array $settings = [])
    {
        $loader = new FilesystemLoader('./templates/');
        $twig = new Environment($loader);
        try {
            $this->response = $twig->render($template_name. ".html.twig", $settings);
        } catch (LoaderError|SyntaxError|RuntimeError $e) {
            return $e->getMessage();
        }
    }

    public function getResponse() {
        return $this->response;
    }
}
