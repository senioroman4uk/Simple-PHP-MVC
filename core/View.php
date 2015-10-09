<?php
namespace Core;
class View
{
    static function render($viewName, $controllerName = null, $data = null)
    {
        //Converting data array to variables
        if (is_array($data) && !empty($data))
            extract($data);

        // checking if path is absolute
        if ($viewName[0] != '/') {
            if (!isset($controllerName))
                throw new \Exception("Controller name must be specified for relative path");
            $viewName = "$controllerName/$viewName";
        }
        else
            $viewName = ltrim($viewName, '/');
        //Including base layout file
        include('/views/main.php');
    }

    static function render404()
    {
        header("HTTP/1.0 404 Not Found", true, 404);
        self::render('/404');
    }
}