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
		$params = $_POST;
		$errors = UserModel::registerUser($params);

		if ($errors) {
			$params['errors'] = $errors;

			$this->render('register', $params);
		}

		$this->redirectToPage('login?registered=true');
	}
}
