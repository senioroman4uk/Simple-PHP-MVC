<?php
namespace Core;

use models;

class Controller
{
    protected $models;
    protected $pages = [];
    protected $user = null;

    function __construct()
    {
        $this->models = new \stdClass();
    }

    /**
     * @return null
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param null $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }


    /**
     * @param array $pages
     */
    public function setPages($pages)
    {
        $this->pages = $pages;
    }

    /**
     * @param $view string, name or absolute pass to view
     * @param array | null $data , data that have to be passed to view
     */
    protected function render($view, $data = [], $layout = null)
    {
//        var_dump($this->user);
        //passing pages to every view that has to be rendered
        $data['pages'] = $this->pages;
        $data['user'] = $this->user;
        View::render($view, $this->getName(), $data, $layout);
    }

    protected function render404()
    {
        $data['pages'] = $this->pages;
        $data['user'] = $this->user;
        View::render404(null, $data);
    }

    protected function partial($viewName, $data = []) {
        return View::partial($viewName, $data);
    }

    /**
     * Returns the name of controller
     * @param bool $lowercase return name in lowercase
     * @return string name of the controller
     */
    protected function getName($lowercase = true)
    {
        list($namespace, $controllerName) = explode('\\', get_class($this));
        $controllerName = substr($controllerName, 0, -10);
        return !$lowercase ? $controllerName : strtolower($controllerName);
    }

    protected function loadModel($modelName, $alias = '')
    {
        $alias = $alias ? $alias : $modelName;
        if (!isset($this->models->{$alias})) {
            require(PROJECT_DIR . '/config/db.php');
            $fileName = PROJECT_DIR . "/models/$modelName.php";
            if (!file_exists($fileName))
                throw new \RuntimeException("file $fileName was not found");

            require_once($fileName);
            $modelName = "models\\$modelName";
            if (!class_exists($modelName, false))
                throw new \RuntimeException("file $fileName was loaded but class $modelName was not found");
            /** @var array $config */
            $model = new $modelName($config['database']['host'], $config['database']['username'],
                $config['database']['password'], $config['database']['database']);
            if (!$model instanceof Model)
                throw new \RuntimeException("class $modelName is not extending core Model class");
            $this->models->$alias = $model;
        }
    }

    protected function getRealIpAddress()
    {
        $ip = '';
        if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
        {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
        {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }

    /**
     * Function to create and display error and success messages
     * @access public
     * @param string session name
     * @param string message
     * @param string display class
     * @return string message
     */
    function addFlash($name = '', $message = '', $class = 'success')
    {
        //We can only do something if the name isn't empty
        if (!empty($name)) {
            //No message, create it
            if (!empty($message) && empty($_SESSION[$name]))
                if (!empty($_SESSION[$name])) {
                    unset($_SESSION[$name]);
                }
            if (!empty($_SESSION[$name . '_class'])) {
                unset($_SESSION[$name . '_class']);
            }

            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;
        }
    }

    protected function echo_json_encode($data, $options = 0, $depth = 512)
    {
        header("Content-Type: application/json");
        echo json_encode($data, $options, $depth);
    }
}