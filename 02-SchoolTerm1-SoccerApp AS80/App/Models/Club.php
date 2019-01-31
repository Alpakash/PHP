<?php

namespace App\Models;

class Club extends Model
{
	protected $table = 'club';

	public function createClub($name, $city_id)
	{
		$query = $this->query_builder
            ->insert($this->table)
            ->values(
                array(
                    'name' => ':name',
                    'city_id' => ':city_id'
                )
            )
            ->setParameter('name', $name)
            ->setParameter('city_id', $city_id)
            ->execute();

		return $query;
	}

    public function getAllClubs()
    {
        $result = $this->connection->prepare("SELECT ci.id AS city_id, c.name AS club_name, c.id AS club_id, ci.name AS city_name 
                                              FROM `club` c JOIN city ci ON ci.id = c.city_id");
        $result->execute();

        return $result->fetchAll();
    }
}