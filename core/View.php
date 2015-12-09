<?php
namespace Core;
class View
{
    static function render($viewName, $controllerName = null, $data = [], $layout = null)
    {
        if (!isset($layout) && $layout !== false)
            $layout = 'main';

        //Converting data array to variables
        if (!empty($data) && is_array($data))
            extract($data);

        // checking if path is absolute
        if ($viewName[0] != '/') {
            if (!isset($controllerName))
                throw new \Exception("Controller name must be specified for relative path");
            $viewName = "$controllerName/$viewName";
        } else
            $viewName = ltrim($viewName, '/');
//        var_dump($viewName);
        //Including base layout file
//        var_dump($layout);
        if ($layout !== false)
            include("/views/$layout.php");
        else
            include("/views/$viewName.php");

    }

    static function render404($layout, $data = [])
    {
        header("HTTP/1.0 404 Not Found", true, 404);
        self::render('/404', null, $data, $layout);
    }

//    static function render403()

    static function paginate($page, $limit, $count, $link)
    {
        $n = min(max(min($page + 5, $count), $limit), $count);
        $i = max(min(max($page - 5, 0), $n - $limit), 0);
        return include(PROJECT_DIR . '/views/pagination.php');
    }

    static function partial($viewName, $data = [])
    {
        if (!empty($data) && is_array($data))
            extract($data);

        ob_start();
        include(PROJECT_DIR . "/views/$viewName.php");
        return ob_get_clean();
    }
}