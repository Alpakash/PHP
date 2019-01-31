<?php

namespace App\Models;

class PlayerTeam extends Model
{
	protected $table = 'player_team';

	public function koppelSpeler($team, $user)
	{
        try {

            $query = $this->query_builder
            ->insert($this->table)
            ->values(
                array(
                    'team_id' => ':team',
                    'player_id' => ':user'
                )
            )
            ->setParameter('team', $team)
            ->setParameter('user', $user)
            ->execute();
        } catch (\Exception $e) {
            return false;
        }

		return $query;
	}
}