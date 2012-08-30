<?php defined('SYSPATH') or die ('No direct script access');

class Controller_Login extends Controller_Template
{
	public function action_index()
	{
		if (!Security::check($this->request->param('id'))) {
			throw new Exception("Bad token!");
		}
		$username = $this->request->post('username');
		$password = crypt($this->request->post('password'), 'generatedsalt');
		$user     = new Model_User();
		$unique_username = $user->is_username_taked($username);
		if ($unique_username === true) {
			throw new Exception("Username must not be unique!");
			$username_from_db = $user->username_from_db($username);
			if ($username !== $username_from_db) {
				throw new Exception("Username is not correct");
			}
		}
		$user_id = $user->id($username);
		$password_from_db = $user->password_from_db($user_id, $password);
		if ($password_from_db !== $password) {
			throw new Exception("Password is not correct \n $password_from_db $password");
		}
		Session::instance()->set('user_id', $user_id);
		$this->request->redirect('');
	}
}
