<?php

namespace app\controllers;

use app\core\Controller;
use app\models\UserModel;

class RegisterController extends Controller
{
	public function get()
	{
		$this->render('register');
	}

	public function post()
	{
		$errors = UserModel::registerUser();

		if ($errors) {
			$this->render('register', $errors);
		}

		$this->redirectToPage('login?registered=true');
	}
}
