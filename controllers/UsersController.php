<?php

namespace app\controllers;

use app\core\Controller;
use app\models\UserModel;

class UsersController extends Controller
{
	public function get()
	{
		$users = UserModel::getUsers();

		// User is not authenticated
		if ($users === false) {
			// Redirect to the home page
			$this->redirectToPage('');
		}

		$this->render('users', ['users' => $users]);
	}
}
