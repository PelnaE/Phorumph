<?php defined("SYSPATH") or die ("No direct script access");

class Controller_Logout extends Controller_Template
{
	public function action_index()
	{
		if (!Security::check($this->request->param("id"))) {
			throw new Exception("Bad token!");
		}
		if (!Auth::instance()->logged_in()) {
			throw new Exception("You must be logged in to logout!");
		}
		Auth::instance()->logout();
		if (Cookie::get('user_id')) {
			Cookie::delete('user_id');
			if (!Cookie::delete('user_id')) {
				throw new Exception("Cookie error.");
			}
		}
		if (!Auth::instance()->logout()) {
			throw new Exception("Session error.");
		}
		$this->redirect('/');
	}
}
