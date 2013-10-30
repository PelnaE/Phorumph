<?php defined('SYSPATH') or die ('No direct script access!');

class Controller_Install extends Controller_Template {

	public function action_index() {
		$count = ORM::factory('User')->count_all();
		if ($count === 0 ) {
			$this->template->content = View::factory('install/index');
			if ($this->request->method() === Request::POST) {
				if (!Security::check($this->request->param('id'))) {
					throw new Exception("Bad token!");
				}
				$post = Validation::factory($_POST)
				->rule('username', 'not_empty')
				->rule('email', 'not_empty')
				->rule('email', 'email')
				->rule('password', 'not_empty')
				->rule('password', 'min_length', array(':value', '8'))
				->rule('password2x', 'not_empty')
				->rule('password', 'matches', array(':validation', 'password', 'password2x'));
				if ($post->check()) {
					$user = new Model_User();
					$post = $this->request->post();
					$user->values($post)->save();
					$adminRole = ORM::factory('Role')
					->where('name', '=', 'admin')
					->find();
					$loginRole = ORM::factory('Role')
					->where('name', '=', 'login')
					->find();

					$user->add('roles', $loginRole);
					$user->add('roles', $adminRole);

					$this->redirect('install/successful');
				} else {
					$this->redirect('install/oops');
				}
			}
		} else {
			$this->redirect('');
		}
	}
	public function action_successful() {
		$this->template->content = View::factory('install/successful');
	}
	public function action_oops() {
		$this->template->content = View::factory('install/oops');
	}
}