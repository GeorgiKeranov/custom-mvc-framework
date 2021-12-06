<?php

// Define constants
define('MAIN_DIRECTORY', __DIR__ . DIRECTORY_SEPARATOR);
define('HOME_URL', '//' . $_SERVER['HTTP_HOST'] . explode('/index.php', $_SERVER['SCRIPT_NAME'])[0] . '/');

// Include autoload file from composer
require_once(MAIN_DIRECTORY . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php' );

use app\core\Router;
use app\core\Authentication;

// Intialize the Authentication
Authentication::initialize();

// Initialize the Router
Router::initialize();
