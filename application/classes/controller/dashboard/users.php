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
}
