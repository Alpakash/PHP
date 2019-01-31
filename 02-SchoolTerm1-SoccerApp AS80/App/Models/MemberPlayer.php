<?php

namespace App\Models;

class MemberPlayer extends Model
{
	protected $table = 'member_player';

    public function createKoppeling($parent, $player)
    {

        try {
            $query = $this->query_builder
                ->insert($this->table)
                ->values(
                    array(
                        'parent_id' => ':parent',
                        'player_id' => ':player_id'
                    )
                )
                ->setParameter('parent', $parent)
                ->setParameter('player_id', $player)
                ->execute();
        } catch (\Exception $e) {
            return false;
        }


        return $query;
    }
}