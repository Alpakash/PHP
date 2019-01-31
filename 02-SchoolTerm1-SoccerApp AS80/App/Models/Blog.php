<?php
/**
 * User: DesleyRoelofsen
 * Date: 03/11/2018
 * Time: 19:55
 */

namespace App\Models;

class Blog extends Model
{
	protected $table = 'blog_item';

	public function getAllBlogs()
	{
		$query = $this->query_builder
			->select('*')
			->from($this->table)
			->orderBy('created_at', 'DESC')
			->execute();

		return $query->fetchAll(\PDO::FETCH_OBJ);
	}

	public function getBlogItem(int $blog_id)
	{
		$stmt = $this->connection->prepare("SELECT * FROM {$this->table} INNER JOIN user ON {$this->table}.user_id=user.id WHERE {$this->table}.id = :id");

		$stmt->execute([
			':id' => $blog_id
		]);

		return $stmt->fetch(\PDO::FETCH_OBJ);
	}

	public function getNewestBlogs()
    {
        $query = $this->query_builder
            ->select("*")
            ->from($this->table)
            ->setMaxResults(3)
            ->orderBy('created_at', 'ASC')
            ->execute();

        return $query->fetchAll(\PDO::FETCH_OBJ);

    }
        public function showAllBlogs()
    {
        $query = $this->query_builder
            ->select("*")
            ->from($this->table)
            ->orderBy('created_at', 'ASC')
            ->execute();

        return $query->fetchAll(\PDO::FETCH_OBJ);
	}
}