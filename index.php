<?php
define('MAIN_DIRECTORY', __DIR__);

// Include autoload file from composer
require_once(MAIN_DIRECTORY . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php' );

use app\core\Router;

// Initialize the router
Router::initialize();
