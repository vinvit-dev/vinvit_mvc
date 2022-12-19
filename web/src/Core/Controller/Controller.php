<?php

namespace Vinvit\MVC\Core\Controller;

interface Controller {
    function render(string $template_name, array $settings = []): string ;
}