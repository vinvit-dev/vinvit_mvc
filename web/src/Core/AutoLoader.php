<?php

namespace Vinvit\MVC\Core;

use Composer\Autoload\ClassLoader;
use ReflectionClass;

class AutoLoader {
    public static function loadClassesImplementInterface(ClassLoader $autoloader, $interface) {
        $classes = $autoloader->getClassMap();
        $list = [];
        foreach ($classes as $name => $path) {
            if(in_array($interface, class_implements($name))) {
                $list[] = $name;
            }
        }
        return $list;
    }
}