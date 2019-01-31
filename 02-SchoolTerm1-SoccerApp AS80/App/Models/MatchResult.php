<?php

namespace App\Models;

class MatchResult extends Model
{
	protected $table = 'match_result';

	public function createMatchResult($match, $home, $away)
	{

	    try {
            $query = $this->query_builder
                ->insert($this->table)
                ->values(
                    array(
                        'match_id' => ':match',
                        'count_home' => ':home',
                        'count_away' => ':away',
                    )
                )
                ->setParameter('match', $match)
                ->setParameter('home', $home)
                ->setParameter('away', $away)
                ->execute();
        } catch (\Exception $e) {
            return false;
        }

		return $query;
	}
}