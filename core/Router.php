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
        $menuModel = new models\pageModel($config['database']['host'], $config['database']['username'],
            $config['database']['password'], $config['database']['database']);
        $pages = $menuModel->getAll();

        foreach ($pages as $page) {
            $parts = explode(" => ", $page->getRoute());
            if (count($parts) !== 2)
                throw new \Exception("Wrong route stored in db " . $page->getRoute());
            $page->setRoute($parts);
            if ($page->getShow() == 0 and $page->getSystem() == 0)
                continue;
            $this->routes[$parts[0]] = $parts[1];
        }

        $menuPages = null;
        if (empty($this->routes))
            throw new \Exception('routes must be set, check config/routes.php');

        $menuPages = array_filter($pages, function ($page) {
            return ($page->getShow() === 1 && $page->getSystem() === 0) || ($page->getShow() === 1 && $page->getSystem() === 1);
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


            if (preg_match($regex, array_shift(explode('?', $_SERVER['REQUEST_URI'])), $matches)) {
                $userModel = new models\usersModel($config['database']['host'], $config['database']['username'],
                    $config['database']['password'], $config['database']['database']);

                $user = null;
                $permission = false;
                //Check permission to access page;
                //Returns user or true if we have access
                list($user, $permission) = $this->checkPermission($route, $pages, $userModel);
                if (!$permission && isset($user)) {
                    //$_SESSION["errors"] = ["You dom't have enough privileges to view this page"];
                    header("HTTP/1.1 403 Forbidden");
                    header("Location: /403");
                    exit(0);
                } else if (!$permission && !isset($user)) {
                    header("HTTP/1.1 301 Moved Permanently");
                    header('Location: /signin');
                    exit(0);
                }


                $route = explode('/', $route);
                if (count($route) != 2)
                    throw new \Exception('error, wrong route parameters, format: <ControllerName>/<ActionName>>');
                unset($matches[0]);


                usort($menuPages, array('\models\Page', "comparator"));
                $matches['_pages'] = $menuPages;
                $matches['_user'] = $user == true && is_object($user) ? $user : null;
                self::execute($route[0], $route[1], $matches);
                return;
            }
        }

        View::render404(false);
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

        $controller->setPages($parameters['_pages']);
        $controller->setUser($parameters['_user']);
        unset($parameters['_pages']);
        unset($parameters['_user']);

        //Calling method from controller
        call_user_func_array([$controller, $actionName], $parameters);
    }

    /**
     * @param $route
     * @param $pages
     * @param $userModel
     * @return bool|null|models/User
     */
    private function checkPermission($route, $pages, $userModel)
    {

        $pages = array_filter($pages, function ($page) use ($route) {
            return $page->getRoute()[1] === $route;
        });

        $user = null;
//        var_dump($_COOKIE['user_id']);
        if (array_key_exists('user_id', $_COOKIE)) {
            $user = $userModel->getOne($_COOKIE['user_id']);
        }

        if (count($pages) === 0)
            return [$user, true];

        $page = array_shift($pages);
        if ($page->getShow() == 0 && $page->getSystem() == 0)
            View::render404(false);

        if ((!isset($user) && $page->getAccess() > 1) ||
            (isset($user) && $user->getRole() < $page->getAccess())
        )
            return [$user, false];
        else
            return [$user, true];
    }

    public function loadModel($modelName)
    {
        require_once(PROJECT_DIR . "/$modelName.php");
    }
}