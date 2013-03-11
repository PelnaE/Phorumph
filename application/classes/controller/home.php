<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller_Template {

	public function action_index()
	{
		$view = View::factory('home');
		$view->categories = ORM::factory('category')->find_all();
		if (Auth::instance()->logged_in()) {
			$user_id = Auth::instance()->get_user()->pk();
            echo Debug::vars($user_id);
            $view->role_id = ORM::factory('roles_user', array('user_id' => $user_id))->as_array();
            echo Debug::vars($view->role_id);
		}
		$this->template->content = $view->render();
	}
} // End Welcome

