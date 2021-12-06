<?php 

namespace app\controllers;

use app\core\Controller;

class LoginController extends Controller
{
	public function get() {
		$this->render('login', $_GET);
	}
}