<?php

namespace App\Models;

class Role extends Model
{
	protected $table = 'user_role';

    public function getAllRoles()
    {
        $roles = $this->query_builder
            ->select('*')
            ->from($this->table)
            ->execute();

        return $roles->fetchAll();
    }

    public function createRolToekenning($user, $rol)
    {
        $query = $this->query_builder
            ->insert("user_has_role")
            ->values(
                array(
                    'user_role_id' => ':rol',
                    'user_id' => ':user_id'
                )
            )
            ->setParameter('rol', $rol)
            ->setParameter('user_id', $user)
            ->execute();

        return $query;
    }

    public function getRolesForTrainer()
    {
        $result = $this->connection->prepare("SELECT * FROM $this->table WHERE id IN (1,2)");
        $result->execute();
        return $result->fetchAll();
    }

    public function deleteRolToekenning($user_role, $user)
    {
        if ($user_role != 4) {
            $result = $this->connection->prepare("DELETE FROM user_has_role WHERE user_role_id = :user_role AND user_id = :user");
            $delete = $result->execute(['user_role' => $user_role, 'user' => $user]);
            return $delete;
        }
        return false;
    }
}