<?php
/**
 * User: DesleyRoelofsen
 * Date: 03/11/2018
 * Time: 22:51
 */

namespace App\Models;


class Comment extends Model
{

	protected $table = "blog_comment";

	public function getAllComments(int $blog_id, int $limit = 3)
	{
		$query = $this->query_builder
			->select("*")
			->from($this->table)
			->where('blog_item_id = :blog_item_id')
			->setParameter('blog_item_id', $blog_id)
			->orderBy('created_at', 'DESC')
			->setMaxResults($limit)
			->execute();

		return $query->fetchAll();
	}

}