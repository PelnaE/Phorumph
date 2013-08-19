<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller_Template {

	public function action_index()
	{
		$view = View::factory('home');
		$view->categories = ORM::factory('Category')->find_all();
		if (Auth::instance()->logged_in()) {
			$user_id = Auth::instance()->get_user()->pk();
            $view->role_id = ORM::factory('Roles_User')->get_last_role_id($user_id);
		}
		$this->template->content = $view->render();
	}
} // End Welcome

