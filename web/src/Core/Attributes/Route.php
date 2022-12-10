<?php

namespace VinvitMVC\Core\Attributes;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Route
{
    public function __construct(public string $method, public string $routePath, public array $settings = [])
    {
    }
}