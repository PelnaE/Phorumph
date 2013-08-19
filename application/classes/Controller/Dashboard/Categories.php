<?php defined('SYSPATH') or die('No direct script access');

class Controller_Dashboard_Categories extends Controller_Template
{
	public function action_create()
	{
		$view = View::factory('dashboard/categories/create');
        $view->roles = ORM::factory('Role')->find_all();
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
			$this->redirect('dashboard/categories/list');
		}
	}

	public function action_list()
	{
		$view = View::factory('dashboard/categories/list');
		$view->categories = ORM::factory('Category')->order_by('id', 'DESC')->find_all();
		$this->template->content = $view->render();
	}
    public function action_delete_category()
    {
        $category_id = $this->request->param('id');
        if (!Security::check($this->request->param('id2'))) {
            throw new Exception("Bad token!");
        }
        $category = ORM::factory('Category');
        $delete_category = $category->delete_category($category_id);
        $this->redirect('dashboard/categories/list');
    }
    public function action_edit()
    {
        $view = View::factory('dashboard/categories/edit');
        $category_id = $this->request->param('id');
        $view->category_id = $category_id;
        $view->category = ORM::factory('Category', $category_id);
        $view->roles = ORM::factory('Role')->find_all();
        $this->template->content = $view->render();

        if ($this->request->method() === Request::POST) {
            $category_name = $this->request->post('name');
            $category_description = $this->request->post('description');
            $login_role = $this->request->post('login_role');
            $admin_role = $this->request->post('admin_role');
            $category = ORM::factory('Category', $category_id);
            $category->name = $category_name;
            $category->description = $category_description;
            $category->save();
            $roles_category = ORM::factory('Roles_Category');
            $roles = ORM::factory('Role')->find_all();
            $category_role_id = $this->request->post('role_id');
            $category->role_id = $category_role_id;
            $category->save();
            $this->redirect('dashboard/categories/list');
        }
    }
}
