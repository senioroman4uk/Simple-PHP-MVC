<?php
require_once('core\Router.php');
require_once('core\Controller.php');
require_once('core\View.php');
use \Core\Router;

$router = Router::getInstance();
$router->route();