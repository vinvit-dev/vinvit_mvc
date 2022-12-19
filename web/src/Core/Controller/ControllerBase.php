<?php

namespace Vinvit\MVC\Core\Controller;

use Vinvit\MVC\Core\Response\TwigResponse;

class ControllerBase implements Controller {

    /**
     * @param string $template_name
     * @param array $settings
     * @return string
     */
    public function render(string $template_name, array $settings = []): string
    {
        return TwigResponse::getResponse($template_name, $settings);
    }
}