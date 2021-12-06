<?php 

namespace app\controllers;

use app\core\Controller;
use app\core\Authentication;
use app\models\UserModel;

class LogoutController extends Controller
{
	public function post()
	{
		// Authenticate the user
		Authentication::removeAuthenticatedUser();

		$this->redirectToPage('');
	}
}