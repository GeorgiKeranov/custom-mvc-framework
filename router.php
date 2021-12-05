<?php

class Router {
	private static $url;
	private static $controllerName;

	public static function initialize() {
		// Other page => '/example'
		if (isset($_SERVER['PATH_INFO'])) {
			$url = $_SERVER['PATH_INFO'];
			self::$url = $url;

			// Split url parameters by '/' symbol and set the first one parameter
			// to be the starting name of model, view and controller
			$urlParams = explode('/', ltrim(self::$url, '/'));
			if (!empty($urlParams[0])) {
				self::$controllerName = $urlParams[0];
				return;
			}
		}

		// Index page => '/'
		self::$url = '/';
		self::$controllerName = 'index';
	}

	public static function includeControllerFile() {
		$controllersDirectory = __DIR__ . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR;
		$controllerFileName = ucfirst(self::$controllerName) . 'Controller.php';
		$controllerFilePath = $controllersDirectory . $controllerFileName;

		// Controller file doesn't exists so get the index controller
		if (!file_exists($controllerFilePath)) {
			$controllerFileName = 'IndexController.php';
			$controllerFilePath = $controllersDirectory . $controllerFileName;
		}

		// Include the controller file
		require_once($controllerFilePath);
	}
}
