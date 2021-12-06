<?php

// Define constants
define('MAIN_DIRECTORY', __DIR__);
define('HOME_URL', '//' . $_SERVER['HTTP_HOST'] . explode('/index.php', $_SERVER['SCRIPT_NAME'])[0] . '/');

// Include autoload file from composer
require_once(MAIN_DIRECTORY . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php' );

use app\core\Router;

// Initialize the router
Router::initialize();
