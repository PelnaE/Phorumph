<?php defined('SYSPATH') or die('No direct script access');

class Controller_Register extends Controller_Template
{
	public $true = true;
	public function action_index()
	{
		$view = View::factory('register');
		if ($this->request->method() === Request::POST) {
			if (!Security::check($this->request->param('id'))) {
				throw new Exception("Bad token!");
			}
			$post = Validation::factory($_POST)
			->rule('username', 'not_empty')
			->rule('username', 'Model_User::is_username_taked')
			->rule('email', 'not_empty')
			->rule('email', 'email')
			->rule('password', 'not_empty')
			->rule('password_again', 'not_empty')
			->rule('password', 'matches', array(':validation', 'password', 'password_again'))
			->rule('picture', 'url');

			if ($post->check()) {
				$username = $this->request->post('username');
				$password = crypt($this->request->post('password'), 'generatedsalt');
				$picture  = $this->request->post('picture');
				$email    = $this->request->post('email');
				$user     = new Model_User();
				$data     = array(
					'username' => $username,
					'password' => $password,
					'picture'  => $picture,
					'email'    => $email,
					);
				$create_user = $user->create($data);

				if (!$create_user) {
					$this->template->content = $view->bind('errors', $this->true);
				}

				$this->template->content = $view->bind('successful', $this->true);
			} else {
				$this->template->content = $view->bind('errors', $this->true);
			}
		}
		$this->template->content = $view->render();
	}
}
