<?php 

namespace app\controllers;

use app\core\Controller;
use app\core\Authentication;
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
		$userId = UserModel::getUserIdByCredentials($params);

		if (is_array($userId)) {
			$params['errors'] = $userId;

			$this->render('login', $params);
		}

		// Authenticate the user
		Authentication::saveAuthenticatedUser($userId);

		$this->redirectToPage('users');
	}
}