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
			$admin_role         = $this->request->post('admin_role');

			if (
				empty($name) and
				empty($description)
				)
			{
				throw new Exception("Please, correct input data!");
			}
			$categories = new Model_Category();
			$create_category = $categories->values($this->request->post())->save();
			if ($user_role) {
				$loginRole = ORM::factory('role')->where('name', '=', 'login')->find();
				$categories->add('roles', $loginRole);
			}
			if ($admin_role) {
				$adminRole = ORM::factory('role')->where('name', '=', 'admin')->find();
				$categories->add('roles', $adminRole);
			}
			if (!$create_category) {
				throw new Exception("Error with creating a category!");
			}
			$this->request->redirect('dashboard/categories/list');
		}
	}

	public function action_list()
	{
		$view = View::factory('dashboard/categories/list');
		$view->categories = ORM::factory('category')->order_by('id', 'DESC')->find_all();
		$this->template->content = $view->render();
	}
    public function action_edit()
    {
        $view = View::factory('dashboard/categories/edit');
        $category_id = $this->request->param('id');
        $view->categories = ORM::factory('category')
        ->get_category($category_id);
        $this->template->content = $view->render();
    }
}
