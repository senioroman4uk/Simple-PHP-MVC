<?php
namespace Core;

use controllers;
use models;

class Router
{
    private static $instance = null;
    private $routes;

    private function __construct($routes)
    {
        $this->routes = $routes;
        spl_autoload_register([$this, 'loadModel']);
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            require_once(PROJECT_DIR . '/config/routes.php');
            /** @var array $config */
            self::$instance = new Router($config['routes']);
        }
        return self::$instance;
    }

    public function route()
    {
        require_once(PROJECT_DIR . '/config/db.php');
        /** @var array $config */
        $pageModel = models\pageModel::getInstance($config['database']['host'], $config['database']['username'],
            $config['database']['password'], $config['database']['database']);
        $pages = $pageModel->getAll();

        foreach ($pages as $page) {
            $parts = explode(" => ", $page->getRoute());
            $this->routes[$parts[0]] = $parts[1];
        }

        if (empty($this->routes))
            throw new \Exception('routes must be set, check config/routes.php');

        $pages = array_filter($pages, function ($page) {
            return $page->getShow() === 1;
        });
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

            if (preg_match($regex, array_shift(explode('?', $_SERVER['REQUEST_URI'])))) {
                $route = explode('/', $route);
                if (count($route) != 2)
                    throw new \Exception('error, wrong route parameters, format: <ControllerName>/<ActionName>>');
                //TODO: pass url params
                self::execute($route[0], $route[1], ['pages' => $pages]);
                return;
            }
        }
        View::render404(['pages' => $pages]);
    }

    private static function execute($controllerName, $actionName, $parameters = [])
    {
        $fileName = PROJECT_DIR . "/controllers/$controllerName.php";
        if (!file_exists($fileName))
            throw new \RuntimeException("file $fileName was not found");
        /** @noinspection PhpIncludeInspection */
        require($fileName);

        $controllerName = "controllers\\$controllerName";
        if (!class_exists($controllerName, false))
            throw new \RuntimeException("file $fileName was loaded but class $controllerName was not found");
        $controller = new $controllerName();
        if (!$controller instanceof Controller)
            throw new \RuntimeException("class $controllerName is not extending core Controller class");
        if (!method_exists($controllerName, $actionName))
            throw new \RuntimeException("error, action <$actionName> not found in Controller <$controllerName>");

        $controller->setPages($parameters['pages']);
        unset($parameters['pages']);

        //Calling method from controller
        call_user_func_array([$controller, $actionName], $parameters);
    }

    public function loadModel($modelName)
    {
        require_once(PROJECT_DIR . "/$modelName.php");
    }
}