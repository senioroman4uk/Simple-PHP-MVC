<?php
namespace Core;
class View
{
    static function render($viewName, $controllerName = null, $data = [])
    {
        //Converting data array to variables
        if (!empty($data) && is_array($data))
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

    static function render404($data = [])
    {
        header("HTTP/1.0 404 Not Found", true, 404);
        self::render('/404', null, $data);
    }

    static function paginate($page, $limit, $count, $link)
    {
        $n = min(max(min($page + 5, $count), $limit), $count);
        $i = max(min(max($page - 5, 0), $n - $limit), 0);
        return include(PROJECT_DIR . '/views/pagination.php');
    }
}