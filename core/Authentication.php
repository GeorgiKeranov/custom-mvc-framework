<?php

namespace app\core;

class Authentication
{
	public static function initialize()
	{
		session_start();
	}

	public static function saveAuthenticatedUser($user_id)
	{
		$_SESSION['user_id'] = $user_id;
	}

	public static function getAuthenticatedUser()
	{
		if (isset($_SESSION['user_id']) && $_SESSION['user_id']) {
			return $_SESSION['user_id'];
		}

		return false;
	}
}
