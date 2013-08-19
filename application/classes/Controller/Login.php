<?php defined('SYSPATH') or die ('No direct script access');

class Controller_Login extends Controller_Template
{
	public function action_index()
	{
		if (!Security::check($this->request->param('id'))) {
			throw new Exception("Bad token!");
		}
		$post = $this->request->post();
		$auth = Auth::instance();
		if ($this->request->post('cookie')) {
			$success = $auth->login($post['username'], $post['password'], TRUE);
		} else {
			$success = $auth->login($post['username'], $post['password'], FALSE);
		}
		if ($success) {
			$this->redirect('/');
		} else {
			throw new Exception("login was unsuccessful!");
		}
	}
}
