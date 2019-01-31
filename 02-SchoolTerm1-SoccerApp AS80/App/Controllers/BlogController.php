<?php
/**
 * User: DesleyRoelofsen
 * Date: 03/11/2018
 * Time: 19:55
 */

namespace App\Controllers;


use App\Models\Blog;
use App\Models\User;

class BlogController extends AbstractController
{
	/**
	 * Get all blogs
	 *
	 * @return mixed
	 */
	public function getAllBlogs()
	{
		$blog_obj = new Blog($this->app);

		$blogs = $blog_obj->getAllBlogs();

        $user = new User($this->app);

        if (!$user->isLoggedIn()) {
            $user->redirect('home');
        }

        $userData = $user->getUser();

		return $this->render('blog.twig', ['blogs' => $blogs, 'user' => $userData]);
	}

	/**
	 * Get blog based on blog_id
	 *
	 * @param int $blog_id
	 * @return mixed
	 */
	public function getBlog(int $blog_id)
	{
		$blogs = new Blog($this->app);

		$blog = $blogs->getBlogItem($blog_id);

		$user = new User($this->app);

        if (!$user->isLoggedIn()) {
            $user->redirect('home');
        }

        $userData = $user->getUser();

		return $this->render('blog-detail.twig', ['blog' => $blog, 'user' => $userData]);
	}

	public function createBlog()
	{

	}
}