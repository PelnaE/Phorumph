<?php defined('SYSPATH') or die('No direct script access');

class Controller_Dashboard_Categories extends Controller_Template
{
	public function action_create()
	{
		$view = View::factory('dashboard/categories/create');
		$this->template->content = $view->render();

		if ($this->request->method() === Request::POST)
		{
			if (!Security::check($this->request->param('id')))
			{
				throw new Exception("Bad token!");
			}
			$name                  = $this->request->post('name');
			$description        = $this->request->post('description');
			$user_role            = $this->request->post('user_role');
			$moderator_role = $this->request->post('moderator_role');
			$admin_role         = $this->request->post('admin_role');

			if (
				empty($name) and
				empty($description) and
				empty($user_role) and
				empty($moderator_role) and
				empty($admin_role)
				)
			{
				throw new Exception("Please, correct input data!");
			}
			$categories = new Model_Category();
			$data          = array(
				'name' => $name,
				'description' => $description,
				'user_role'     => $user_role,
				'moderator_role' => $moderator_role,
				'admin_role'       => $admin_role,
				);
			$create_category = $categories->create_category($data);
			if (!$create_category) {
				throw new Exception("Error with creating a category!");
			}
			$this->request->redirect('dashboard/categories/list');
		}
	}
}
