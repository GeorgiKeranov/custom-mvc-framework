<?php

namespace app\core;

class Router
{
	private static $url;
	private static $urlParams;
	private static $requestMethod;
	private static $controllerName;
	private static $controllerClass;

	// Get current url based on the path that the user have requested
	private static function setUrlBasedOnThePath()
	{
		// URL example => '/example'
		if (isset($_SERVER['PATH_INFO'])) {
			self::$url = $_SERVER['PATH_INFO'];
			return;
		}

		// Home page url
		self::$url = '/';
	}

	// Split url parameters by "/". Example "/users/add" to "['users', 'add']".
	private static function setUrlParams()
	{
		$url = self::$url;

		// Params are empty if we are on the home page
		if ($url === '/') {
			self::$urlParams = [];
			return;
		}

		// Split url parameters by '/' symbol
		self::$urlParams = explode('/', ltrim(self::$url, '/'));
	}

	// Set controller name based on the first url parameter
	private static function setControllerName()
	{
		$urlParams = array_filter(self::$urlParams);

		// Url parameters are empty so the controller will be index
		if (empty($urlParams)) {
			self::$controllerName = 'index';
			return;
		}

		self::$controllerName = $urlParams[0];
	}

	// Set request method "GET/POST/PUT/DELETE"
	private static function setRequestMethod()
	{
		self::$requestMethod = $_SERVER['REQUEST_METHOD'];
	}

	// Set controller class based on the controller name
	private static function setControllerClass()
	{
		$controllersNamespace = 'app\controllers\\';
		$controllerClass = $controllersNamespace . ucfirst(self::$controllerName) . 'Controller';

		// Controller class doesn't exists so get the index controller
		if (!class_exists($controllerClass)) {
			$controllerClass = $controllersNamespace . 'PageNotFoundController';
		}

		self::$controllerClass = $controllerClass;
	}

	// Dynamically call method name from dynamic class name
	private static function callMethodFromController() {
		$methodName = strtolower(self::$requestMethod);

		$urlParams = self::$urlParams;

		// Remove first parameter that is used for the controller name
		unset($urlParams[0]);

		if (!empty($urlParams)) {
			foreach ($urlParams as $urlParam) {
				$methodName .= ucfirst(strtolower($urlParam));
			}
		}

		$controller = new self::$controllerClass;
		$controller->$methodName();
	}

	// Intialize the properties in the class
	public static function initialize()
	{
		// Set required properties
		self::setUrlBasedOnThePath();
		self::setUrlParams();
		self::setRequestMethod();
		self::setControllerName();
		self::setControllerClass();

		// Call correct method from the selected controller class
		self::callMethodFromController();
	}
}
