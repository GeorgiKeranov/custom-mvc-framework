<?php

namespace app\models;

use app\core\Model;

class UserModel extends Model
{
	public static function registerUser($fields) {
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

		// Encrypt the password
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
}
