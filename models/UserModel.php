<?php

namespace app\models;

use app\core\Model;
use app\core\Authentication;

class UserModel extends Model
{
	public static function registerUser($fields)
	{
		// Validate fields
		$required_fields = ['username', 'password', 'email'];
		$errors = self::validateFields($required_fields, $fields);

		if ($errors) {
			return $errors;
		}

		// Check if there is a user with the same username or email
		$query = 'SELECT username, email FROM users WHERE username = ? OR email = ?';
		$results = self::executeQuery($query, [$fields['username'], $fields['email']], 'ss');
		if ($results->num_rows > 0) {
			while ($row = $results->fetch_assoc()) {
				$username = $row['username'];
				$email = $row['email'];

				if ($fields['username'] === $username) {
					$errors['username'] = 'This username is already registered, please choose another one!';
				}

				if ($fields['email'] === $email) {
					$errors['email'] = 'This email is already registered, please choose another one!';
				}
			}

			return $errors;
		}

		// Hash the password
		$fields['password'] = password_hash($fields['password'], PASSWORD_BCRYPT);

		// Get current date
		$current_date = date('Y-m-d');

		// Generate indexed array of values in order to extract them
		$fields_values = [
			$fields['username'],
			$fields['password'],
			$fields['email'],
			$current_date
		];

		// Register user
		$query = 'INSERT INTO users (username, password, email, date_created) VALUES (?, ?, ?, ?)';
		$results = self::executeQuery($query, $fields_values, 'ssss');

		return false;
	}

	public static function getUserIdByCredentials($credentials)
	{
		// Validate fields
		$required_fields = ['username', 'password'];
		$errors = self::validateFields($required_fields, $credentials);

		if ($errors) {
			return $errors;
		}

		// Get user with the given username
		$query = 'SELECT id, username, password FROM users WHERE username = ?';
		$results = self::executeQuery($query, [$credentials['username']], 's');

		// User not found
		if ($results->num_rows === 0) {
			return ['error' => 'Bad credentials, please check your username and password, and try again!'];
		}

		$user = $results->fetch_assoc();

		// Password is not valid
		if (!password_verify($credentials['password'], $user['password'])) {
			return ['error' => 'Bad credentials, please check your username and password, and try again!'];
		}

		return $user['id'];
	}

	public static function getUsers()
	{
		$user_authenticated_id = Authentication::getAuthenticatedUser();

		// User is not authenticated
		if (!$user_authenticated_id) {
			return false;
		}

		// Get user with the given username
		$query = 'SELECT id, username, email, date_created FROM users WHERE 1';
		$results = self::executeQuery($query);
		if ($results->num_rows === 0) {
			return [];
		}

		$users = [];
		while ($row = $results->fetch_assoc()) {
			$users[] = $row;
		}

		return $users;
	}
}
