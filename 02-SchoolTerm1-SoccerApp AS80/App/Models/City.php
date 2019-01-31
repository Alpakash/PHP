<?php

namespace App\Models;

class City extends Model
{
	protected $table = 'city';

	public function createCity($name)
	{
		$query = $this->query_builder
            ->insert($this->table)
            ->values(
                array(
                    'name' => ':name',
                )
            )
            ->setParameter('name', $name)
			->execute();

		return $query;
	}

    public function getAllCities()
    {
        $query = $this->query_builder
            ->select('*')
            ->from($this->table)
            ->execute();

        return $query->fetchAll();
    }
}