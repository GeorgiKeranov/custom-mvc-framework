<?php

namespace app\controllers;

use app\core\Controller;

class PageNotFoundController extends Controller
{
	public function get()
	{
		$this->render('404');
	}
}
