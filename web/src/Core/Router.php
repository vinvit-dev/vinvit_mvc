<?php

namespace VinvitMVC\Core;

use Pecee\Http\Middleware\Exceptions\TokenMismatchException;
use Pecee\SimpleRouter\Exceptions\HttpException;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;
use VinvitMVC\Core\Attributes\Route;

class Router {

    /**
     * @param array $controllers
     * @return void
     * @throws \ReflectionException
     */
    public function registerControllers(array $controllers) {
        foreach ($controllers as $controller) {
            $reflectionController = new \ReflectionClass($controller);
            foreach ($reflectionController->getMethods() as $method) {
               $attributes = $method->getAttributes(Route::class);
               foreach ($attributes as $attribute) {
                   /** @var Route $route */
                   $route = $attribute->newInstance();

                   $this->register($route->method, $route->routePath, [$controller, $method->getName()], $route->settings);
               }
            }
        }
    }
    /**
     * Register new route.
     */
    public function register(string $method, string $route, $action, $settings = null) {
        SimpleRouter::match((array) $method, $route, $action)->where($settings);
    }

    /**
     * Register get route.
     */
    public function get(string $route, $action, $settings = null) {
        SimpleRouter::get($route, $action)->where($settings);
    }

    /**
     * Register post route.
     */
    public function post(string $route, $action, $settings = null) {
        SimpleRouter::post($route, $action)->where($settings);
    }

    /**
     * Register put route.
     */
    public function put(string $route, $action, $settings = null) {
        SimpleRouter::put($route, $action)->where($settings);
    }

    /**
     * Register delete route.
     */
    public function delete(string $route, $action, $settings = null) {
        SimpleRouter::delete($route, $action)->where($settings);
    }

    /**
     *  Resolve route.
     */
    public function start() {
        try {
            SimpleRouter::start();
        } catch (NotFoundHttpException|TokenMismatchException|HttpException|\Exception $e) {
            return $e->getMessage();
        }
    }
}