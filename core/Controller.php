<?php
namespace Core;
class Controller
{
    function __construct()
    {

    }

    /**
     * @param $view string, name or absolute pass to view
     * @param array | null $data , data that have to be passed to view
     */
    protected function render($view, $data = null)
    {
        View::render($view, $this->getName(), $data);
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
}