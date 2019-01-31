<?php

namespace App\Models;

class UserCarAvailable extends Model
{
	protected $table = 'user_car_available';

    public function beschikbaarStellen($match)
    {

        try {
            $query = $this->query_builder
                ->insert($this->table)
                ->values(
                    array(
                        'match_id' => ':match',
                        'user_id' => ':user'
                    )
                )
                ->setParameter('match', $match)
                ->setParameter('user', $_SESSION['user_id'])
                ->execute();
        } catch (\Exception $e) {
            return false;
        }


        return $query;
    }

    public function getAvailables()
    {
        $result = $this->connection->prepare("SELECT *, cp.id AS parent_id, t.name AS hometeam, tt.name AS awayteam FROM `user_car_available` uca 
                                                        JOIN `match` m ON m.id = uca.match_id 
                                                        JOIN user u ON u.id = uca.user_id 
                                                        JOIN team t ON t.id = m.home_team_id 
                                                        JOIN team tt ON tt.id = m.away_team_id
                                                        JOIN car_parent cp ON cp.user_id = uca.user_id");
        $result->execute();
        return $result->fetchAll();
    }
}