<?php

namespace app\core;

class Controller
{
	private function getViewPath($view) {
		$viewsFolder = MAIN_DIRECTORY . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;
		$viewPath = $viewsFolder . $view . '.php';

		// View doesn't exists so return the views/404.php file
		if(!file_exists($viewPath)) {
			$viewPath = $viewsFolder . '404.php';
		}

		return $viewPath;
	}

	public function render($view, $params = []) {
		$viewPath = $this->getViewPath($view);

		include_once($viewPath);
	}
}
