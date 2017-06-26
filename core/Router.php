<?php

namespace App\Core;

class Router {
    protected $mapping = [
        "GET" => [],
        "POST" => []
    ];

    public static function load($routesPath)
    {
        $router = new static;
        require $routesPath;
        return $router;
    }

    public function get($path, $controller)
    {
        $this->mapping["GET"][$path] = $controller;
    }

    public function post($path, $controller) {
        $this->mapping["POST"][$path] = $controller;
    }

    public function direct($uri, $method)
    {
        // If path exists in the mapping, handle it.
        // Else, throw an exception.
        if(array_key_exists($uri, $this->mapping[$method])) {
            $this->doAction(...explode('@', $this->mapping[$method][$uri]));
        } else {
            throw new \Exception("Path[{$uri}] could not be resolved for {$method}.");
        }
    }

    protected function doAction($controller, $action) {
        $controller = "App\\Controllers\\{$controller}";
        $ctrl = new $controller;

        if(method_exists($ctrl, $action)) {
            $ctrl->$action();
        } else {
            throw new \Exception("Action[{$action}] is not defined on the controller[$ctrl].");
        }
    }
}