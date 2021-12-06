<?php

namespace app\core;

class Model
{
	public static function validateFields($requiredFields, $fields)
	{
		$errors = [];

		foreach ($requiredFields as $requiredField) {
			if (empty($fields[$requiredField])) {
				$errors[$requiredField] = 'This field is required';
			}
		}

		return $errors;
	}

	public static function executeQuery($query, $params = [], $paramsTypes = '')
	{
		$database = Database::getInstance();

		return $database->executeQuery($query, $params, $paramsTypes);
	}
}
