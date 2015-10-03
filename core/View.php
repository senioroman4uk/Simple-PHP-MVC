<?php
namespace Core;
class View
{
    static function render($viewName, $controllerName, $data = null)
    {
        //Converting data array to variables
        if (is_array($data) && !empty($data))
            extract($data);

        // checking if path is absolute
        if ($viewName[0] != '/')
            $viewName = "$controllerName/$viewName";
        else
            $viewName = ltrim($viewName, '/');
        //Including base layout file
        include('/views/main.php');
    }
}