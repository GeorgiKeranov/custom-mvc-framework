<?php

namespace app\controllers;

use app\core\Controller;

class IndexController extends Controller
{
	public function get()
	{
		$this->render('home');
	}
}
