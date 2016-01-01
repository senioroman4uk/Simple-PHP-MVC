<?php
define('PROJECT_DIR', __DIR__);
define('DS', DIRECTORY_SEPARATOR);

require_once('core/Router.php');
require_once('core/Model.php');
require_once('core/Controller.php');
require_once('core/View.php');
require_once('core/iimysqli_result.php');

use \Core\Router;

session_start();
//for hosting
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

$router = Router::getInstance();
$router->route();