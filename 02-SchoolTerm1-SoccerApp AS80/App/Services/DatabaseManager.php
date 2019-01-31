<?php

namespace App\Services;

use \Doctrine\DBAL\Configuration;
use \Doctrine\DBAL\DriverManager;

class DatabaseManager extends Service{

	/**
	 * Boot the database connection
	 */
	public function boot()
    {
    	// Make a new configuration instance
		$config = new Configuration();

		// Create a array with the database credentials
		$configParams = [
			'dbname' => getenv('DB_NAME'),
			'user' => getenv('DB_USERNAME'),
			'password' => getenv('DB_PASS'),
			'host' => getenv('DB_HOST'),
			'port' => getenv('DB_PORT'),
			'driver' => getenv('DB_DRIVER'),
		];

		// Give the database driver the credentials
		$connection = DriverManager::getConnection($configParams, $config);

		$queryBuilder = $connection->createQueryBuilder();

		$this->app->instance('query_builder', $queryBuilder, "App\\Services\\DatabaseManager");

		// Bind the database connection to the container
		$this->app->instance('conn', $connection, "App\\Services\\DatabaseManager");
    }
}