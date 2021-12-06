<?php

namespace app\core;

class Controller
{
	private function renderView($view, $render_error_view = true) {
		$viewsFolder = MAIN_DIRECTORY . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;
		$viewPath = $viewsFolder . $view . '.php';

		if (!file_exists($viewPath)) {
			// Do not render nothing
			if (!$render_error_view) {
				return;
			}

			// View doesn't exists so return the views/404.php file
			$viewPath = $viewsFolder . '404.php';
		}

		include_once($viewPath);
	}

	public function render($view, $params = []) {
		$this->renderView('parts/header');

		$this->renderView($view);

		$this->renderView('parts/footer');
	}
}
