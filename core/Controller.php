<?php

namespace app\core;

class Controller
{
	private function renderView($view, $on_error_view = false, $params = []) {
		$viewsFolder = MAIN_DIRECTORY . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;
		$viewPath = $viewsFolder . $view . '.php';

		if (!file_exists($viewPath)) {
			// Do not render nothing
			if (!$on_error_view) {
				return;
			}

			// View doesn't exists so return the on error view
			$viewPath = $viewsFolder . $on_error_view;
		}

		// Include the view file
		include_once($viewPath);
	}

	public function render($view, $params = []) {
		$this->renderView('parts/header');

		$this->renderView($view, '404', $params);

		$this->renderView('parts/footer');
	}

	public function redirectToPage($page) {
		$url = HOME_URL . $page;

		header('Location: ' . $url);
		exit();
	}
}
