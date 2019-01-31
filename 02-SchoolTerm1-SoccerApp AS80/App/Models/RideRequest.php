<?php

namespace App\Models;

class RideRequest extends Model
{
	protected $table = 'ride_request';

    public function insertRideRequest($parent_id, $match)
    {
        try {
            $query = $this->query_builder
                ->insert($this->table)
                ->values(
                    array(
                        'car_parent_id' => ':parent',
                        'player_id' => ':user',
                        'match_id' => ':match'
                    )
                )
                ->setParameter('parent', $parent_id)
                ->setParameter('user', 1)
                ->setParameter('match', $match)
                ->execute();
        } catch (\Exception $e) {
            return false;
        }


        return $query;
    }
}