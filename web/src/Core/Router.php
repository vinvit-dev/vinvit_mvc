<?php

namespace VinvitMVC\Core;

class Router {
    private array $routes = [];

    /**
     * Register new route.
     *
     * @param $method
     *  Route method GET|POST|PUT|DELETE.
     * @param $route
     *  Route url.
     * @param $action
     *  Route action method, class.
     * @return $this
     */
    public function register(string $method, string $route, $action) {
        $this->routes[strtoupper($method)][$route] = $action;

        return $this;
    }

    /**
     * Register get route.
     *
     * @param $route
     *  Route url.
     * @param $action
     *  Route action method, class.
     * @return $this
     */
    public function get(string $route, string $action)
    {
        return $this->register('get', $route, $action);
    }

    /**
     * Register post route.
     *
     * @param $route
     *  Route url.
     * @param $action
     *  Route action method, class.
     * @return $this
     */
    public function post(string $route, string $action) {
        return $this->register('post', $route, $action);
    }

    /**
     * Register put route.
     *
     * @param $route
     *  Route url.
     * @param $action
     *  Route action method, class.
     * @return $this
     */
    public function put(string $route, string $action) {
        return $this->register('put', $route, $action);
    }

    /**
     * Register delete route.
     *
     * @param $route
     *  Route url.
     * @param $action
     *  Route action method, class.
     * @return $this
     */
    public function delete(string $route, string $action) {
        return $this->register('delete', $route, $action);
    }

    /**
     *  Resolve route.
     *
     * @param string $requestUri
     *  Request uri.
     * @param string $requestMethod
     *  Request method GET|POST|PUT|DELETE.
     * @return mixed|string
     */
    public function resolve(string $requestUri, string $requestMethod) {
        $route = explode('?', $requestUri)[0];

        if(!isset($this->routes[$requestMethod][$route])) {
            return "Route " . var_export($route, true) . " not found!";
        }

        $action = $this->routes[$requestMethod][$route];

        if(is_callable($action)) {
            return call_user_func($action);
        }

        return "Not found Action: " . var_export($action, true);
    }
}