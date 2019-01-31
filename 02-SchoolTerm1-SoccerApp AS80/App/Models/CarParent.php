<?php

namespace App\Models;

class CarParent extends Model
{
	protected $table = 'car_parent';

	public function createMaxPassengers($passengers)
	{

	    try {
            $query = $this->query_builder
                ->insert($this->table)
                ->values(
                    array(
                        'max_passengers' => ':passengers',
                        'user_id' => ':user'
                    )
                )
                ->setParameter('passengers', $passengers)
                ->setParameter('user', $_SESSION['user_id'])
                ->execute();
        } catch (\Exception $e) {
            return false;
        }

		return $query;
	}

    public function getMaxPassengers()
    {
        $query = $this->query_builder
            ->select('*')
            ->from($this->table)
            ->where('user_id = :id')
            ->setParameter('id', $_SESSION['user_id'])
            ->execute();

        return $query->fetch();
    }
}