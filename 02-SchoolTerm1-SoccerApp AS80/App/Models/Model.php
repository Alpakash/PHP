<?php

namespace App\Models;

use App\Application;
use Doctrine\DBAL\Query\QueryBuilder;

abstract class Model
{
	/** @var QueryBuilder $query_builder */
	protected $query_builder;

	/** @var \Doctrine\DBAL\Connection $connection */
	protected $connection;

	/** @var \App\Application $app */
	protected $app;

	public function __construct(Application $app)
	{
		// The reason why the second argument is true, than we will get everytime a new instance of the query_builder.
		$this->query_builder = $app->get('query_builder', true);
		$this->app = $app;
		$this->connection = $app->get('conn');
	}
}