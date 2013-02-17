<?php defined('SYSPATH') or die ('No direct script access');

class Controller_Login extends Controller_Template
{
	public function action_index()
	{
		if (!Security::check($this->request->param('id'))) {
			throw new Exception("Bad token!");
		}
		$post = $this->request->post();
		$auth = Auth::instance();var_dump($auth);exit;
		$success = $auth->login($post['username'], $post['password']);
		if ($success) {
			if ($post['cookie']) {
				Cookie::set('logged_with_cookies', true);
			}
			$this->request->redirect('/');
		} else {
			throw new Exception("login was unsuccessful!");
		}
	}
}
