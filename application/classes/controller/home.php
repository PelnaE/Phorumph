<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller_Template {

	public function action_index()
	{
		$view = View::factory('home');
		$view->categories = ORM::factory('category')->find_all();
        $view->roles = ORM::factory('role')->find_all();
		if (Auth::instance()->logged_in()) {
			$user_id = Auth::instance()->get_user()->pk();
			$users = ORM::factory('User')->get_data($user_id);
            $view->role_id = ORM::factory('role', $user_id)->id;
		}
		$this->template->content = $view->render();
	}
} // End Welcome

