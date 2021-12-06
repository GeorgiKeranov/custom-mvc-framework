<?php

namespace app\core;

class Router
{
	private static $url;
	private static $controllerName;

	// Get controllerName based on the requested path
	public static function initialize()
	{
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

	public static function includeController()
	{
		$controllersNamespace = 'app\controllers\\';
		$controllerClass = $controllersNamespace . ucfirst(self::$controllerName) . 'Controller';

		// Controller class doesn't exists so get the index controller
		if (!class_exists($controllerClass)) {
			$controllerClass = $controllersNamespace . 'PageNotFoundController';
		}

		// Intialize the controller class
		$controller = new $controllerClass();
		$controller->get();
	}
}
