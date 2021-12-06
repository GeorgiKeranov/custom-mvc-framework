<?php 

namespace app\controllers;

use app\core\Controller;
use app\models\UserModel;

class LoginController extends Controller
{
	public function get()
	{
		$this->render('login', $_GET);
	}

	public function post()
	{
		$params = $_POST;
		$errors = UserModel::checkUserCredentials($params);

		if ($errors) {
			$params['errors'] = $errors;

			$this->render('login', $params);
		}

		echo 'User is authenticated';
		exit();

		// Authenticate the user

		$this->redirectToPage('users');
	}
}