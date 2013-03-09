<?php defined('SYSPATH') or die('No direct script access');

class Controller_Dashboard_Categories extends Controller_Template
{
	public function action_create()
	{
		$view = View::factory('dashboard/categories/create');
        $view->roles = ORM::factory('role')->find_all();
		$this->template->content = $view->render();

		if ($this->request->method() === Request::POST)
		{
			if (!Security::check($this->request->param('id')))
			{
				throw new Exception("Bad token!");
			}

            $name        = $this->request->post('name');
			$description = $this->request->post('description');
			$role_id     = $this->request->post('role_id');

			if (
				empty($name) and
				empty($description)
				)
			{
				throw new Exception("Please, correct input data!");
			}
			$categories = new Model_Category();
			$create_category = $categories->values($this->request->post())->save();
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
        $view->category_id = $category_id;
        $view->category = ORM::factory('category', $category_id);
        $categories_roles = ORM::factory('roles_category')
        ->where('category_id', '=', $category_id)->find_all()->as_array();
        foreach ($categories_roles as $role)
        {
            $category_roles[] = $role->role_id;
        }
        $view->categories_roles = $category_roles;
        $view->roles = ORM::factory('role')->find_all();
        $this->template->content = $view->render();

        if ($this->request->method() === Request::POST) {
            $category_name = $this->request->post('name');
            $category_description = $this->request->post('description');
            $login_role = $this->request->post('login_role');
            $admin_role = $this->request->post('admin_role');
            $category = ORM::factory('category', $category_id);
            $category->name = $category_name;
            $category->description = $category_description;
            $category->save();
            $roles_category = ORM::factory('roles_category');
            $roles = ORM::factory('role')->find_all();
            $category_role_id = $this->request->post('role_id');
            $category->role_id = $category_role_id;
            $category->save();
            $this->request->redirect('dashboard/categories/list');
        }
    }
}
