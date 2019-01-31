<?php

namespace App\Models;

class Team extends Model
{
	protected $table = 'team';

	public function createTeam($name, $club_id, $coach_id)
	{
		$query = $this->query_builder
            ->insert($this->table)
            ->values(
                array(
                    'name' => ':name',
                    'club_id' => ':club_id',
                    'coach_id' => ':coach_id'
                )
            )
            ->setParameter('name', $name)
            ->setParameter('club_id', $club_id)
            ->setParameter('coach_id', $coach_id)
            ->execute();

		return $query;
	}

    public function getTeams()
    {
        $result = $this->connection->prepare("SELECT t.id, t.name, c.name AS club_name, u.first_name, u.last_name FROM `team` t 
                                              JOIN club c ON c.id = t.club_id 
                                              JOIN user u ON u.id = t.coach_id");
        $result->execute();

        return $result->fetchAll();
    }

    public function getTeamsForTrainer()
    {
        $result = $this->connection->prepare("SELECT * FROM `team` WHERE coach_id = :id");
        $result->execute(['id' => $_SESSION['user_id']]);

        return $result->fetchAll();
    }

    public function deleteTeam($id)
    {
        $result = $this->connection->prepare("DELETE FROM $this->table WHERE id = :id");
        $delete = $result->execute(['id' => $id]);
        return $delete;
    }
}