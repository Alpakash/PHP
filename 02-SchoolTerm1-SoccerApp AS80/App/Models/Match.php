<?php

namespace App\Models;

class Match extends Model
{
	protected $table = '`match`';

	public function createMatch($date, $home, $away, $type, $description)
	{
		$query = $this->query_builder
            ->insert($this->table)
            ->values(
                array(
                    'date' => ':date',
                    'home_team_id' => ':home',
                    'away_team_id' => ':away',
                    'description' => ':description',
                    'type' => ':type'

                )
            )
            ->setParameter('date', $date)
            ->setParameter('home', $home)
            ->setParameter('away', $away)
            ->setParameter('description', $description)
            ->setParameter('type', $type)

            ->execute();

		return $query;
	}

    public function getMatches()
    {
        $result = $this->connection->prepare("SELECT *, t.name AS hometeam, tt.name AS awayteam, m.id AS match_id FROM `match` m 
                                              JOIN team t ON t.id = m.home_team_id 
                                              JOIN team tt ON tt.id = m.away_team_id ");
        $result->execute();

        return $result->fetchAll();
    }

    public function getTrainerMatches()
    {
        $result = $this->connection->prepare("SELECT *, t.name AS hometeam, tt.name AS awayteam, m.id AS match_id FROM `match` m 
                                              JOIN team t ON t.id = m.home_team_id 
                                              JOIN team tt ON tt.id = m.away_team_id 
                                              WHERE t.coach_id = :id OR tt.coach_id = :id");
        $result->execute(['id' => $_SESSION['user_id']]);

        return $result->fetchAll();
    }
}