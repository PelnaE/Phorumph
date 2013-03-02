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
            $roles = ORM::factory('role')->find_all();
            foreach ($roles as $role) {
                if (!in_array($role->id, array_values($category_roles))) {
                    $category->add('roles', $role->id);
                }
                if (empty($login_role)) {
                    $category->delete('roles', 1);
                }
                if (empty($admin_role)) {
                    $category->delete('roles', 2);
                }
            }
            $this->request->redirect('dashboard/categories/list');
        }
    }
}
