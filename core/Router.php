<?php
namespace Core;

use controllers;

class Router
{

    private static $instance = null;
    private $routes;

    private function __construct($routes)
    {
        $this->routes = $routes;
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            require_once('config/routes.php');
            self::$instance = new Router($config['routes']);
        }
        return self::$instance;
    }

    public function route()
    {
        if (!isset($this->routes) || empty($this->routes))
            throw new \Exception('routes must be set, check config/routes.php');

        foreach ($this->routes as $regex => $route) {
            $regex = explode(' ', trim($regex));
            $method = null;

            // if exact method was specified(GET/POST)
            if (count($regex) === 2) {
                if (strtoupper($regex[0]) !== $_SERVER['REQUEST_METHOD'])
                    continue;
                $regex = $regex[1];
            } else
                $regex = $regex[0];

            if (preg_match($regex, $_SERVER['REQUEST_URI'])) {
                $route = explode('/', $route);
                if (count($route) < 2)
                    throw new \Exception('error, wrong route parameters, format: <ControllerName>/<ActionName>>');

                self::execute($route[0], $route[1], array_slice($route, 2));
                return;
            }
        }
        header("HTTP/1.0 404 Not Found");
        echo '<b>Page not found</b>';
    }

    private static function execute($controllerName, $actionName, $parameters = [])
    {
        require("controllers/$controllerName.php");
        $controllerName = "controllers\\$controllerName";
        $controller = new $controllerName();
        if (!method_exists($controllerName, $actionName))
            throw new \Exception("error, action <$actionName> not found in Controller <$controllerName>");

        //Calling method from controller
        call_user_func_array([$controller, $actionName], $parameters);
    }
}