<?php
require_once('core\Router.php');
require_once('core\Model.php');
require_once('core\ViewModel.php');
require_once('core\Controller.php');
require_once('core\View.php');

define('PROJECT_DIR', __DIR__);
use \Core\Router;

$router = Router::getInstance();
$router->route();