<?php

namespace app\core;

class Database
{
	private static $instance;
	private static $connection;

	private function __construct()
	{
		$dbConfig = self::getDatabaseConfig();

		$connection = new \mysqli($dbConfig->host, $dbConfig->username, $dbConfig->password, $dbConfig->database_name);

		// Connection with the database is not successful
		if ($connection->connect_error) {
			die('Connection failed: ' . $connection->connect_error);
		}

		self::$connection = $connection;
	}

	private static function getDatabaseConfig()
	{
		$configFilePath = MAIN_DIRECTORY . 'config.json';
		
		// Config file not found
		if (!file_exists($configFilePath)) {
			echo 'ERROR: Config json file doesn\'t exists!';
			exit();
		}

		// Read database related configuration from config.json file
		$configFileContent = file_get_contents($configFilePath);
		$config = json_decode($configFileContent);

		if (!is_object($config) || !property_exists($config, 'database')) {
			echo 'ERROR: Configuration is not correct in config.json file!';
			exit();
		}

		return $config->database;
	}

	// Singleton pattern
	public static function getInstance()
	{
		if (!self::$instance) {
			self::$instance = new Database();
		}

		return self::$instance;
	}

	public static function executeQuery($query, $params, $paramsTypes)
	{
		$statement = self::$connection->prepare($query);
		$statement->bind_param($paramsTypes, ...$params);

		$is_success = $statement->execute();

		if (!$is_success) {
			echo 'ERROR: Bad Query!';
			exit();
		}

		return $statement->get_result();
	}
}
