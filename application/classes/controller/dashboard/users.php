<?php defined('SYSPATH') or die ('No direct script access!');

class Controller_Dashboard_Users extends Controller_Template
{
	public function action_list()
	{
		$view = View::factory('dashboard/users/list');
		$user = ORM::factory('User');
		$view->users = $user->find_all();
		$this->template->content = $view->render();
	}

    public function action_roles_list()
    {
        $view = View::factory('dashboard/users/roles_list');
        $view->roles = ORM::factory('Roles_User')->find_all();
        $view->user_id = Auth::instance()->get_user()->pk();
        $this->template->content = $view->render();
    }
    public function action_add_role()
    {
        $view = View::factory('dashboard/users/add_role');
        $view->users = ORM::factory('User')->find_all();
        $view->roles = ORM::factory('Role')->find_all();
        $this->template->content = $view->render();

        if ($this->request->method() === Request::POST) {
            $role_id = $this->request->post('role_id');
            $user_id = $this->request->post('user_id');
            $roles_user = ORM::factory('Roles_User');
            $roles_user->role_id = $role_id;
            $roles_user->user_id = $user_id;
            $roles_user->save();
            $this->request->redirect('dashboard/users/roles_list');
        }
    }
    public function action_delete_role()
    {
        $role_id = $this->request->param('id');
        $user_id = $this->request->param('id2');
        if (!Security::check($this->request->param('id3'))) {
            throw new Exception("Bad token!");
        }
        $roles_user = ORM::factory('Roles_User')->delete_role($role_id, $user_id);
        $this->request->redirect('dashboard/users/roles_list');
    }

	public function action_change_username()
	{
		$view     = View::factory('dashboard/users/change_username');
		$user_id = $this->request->param('id');
		$users    = ORM::factory('User');
		$view->user = $users->where('id', '=', $user_id)->find();
		$view->user_id = $user_id;
		$this->template->content = $view->render();

		if ($this->request->method() === Request::POST) {
			if (!Security::check($this->request->param('id2'))) {
				throw new Exception('Bad token!');
			}
			$post = Validation::factory($this->request->post())
			->rule('username', 'not_empty');

			if ($post->check()) {
				$users->username = $this->request->post('username');
				$users->save();
				$this->request->redirect('dashboard/users/list');
			}
		}
	}
    public function action_delete_user()
    {
        $user_id = $this->request->param('id');
        if (!Security::check($this->request->param('id2'))) {
            throw new Exception("Bad token!");
        }
        $user = ORM::factory('user');
        $delete_user = $user->delete_user($user_id);
        $this->request->redirect('dashboard/users/list');
    }
}
