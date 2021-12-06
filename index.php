<?php
// Include autoload file from composer
require_once(__DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php' );

use app\core\Router;

// Initialize the router
Router::initialize();

// Include controller based on the requested page
Router::includeController();
