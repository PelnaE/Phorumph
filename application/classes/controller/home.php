<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller_Template {

	public function action_index()
	{
		$view = View::factory('home');
		$category = new Model_Category();
		$view->categories = $category->get_all_categories();
        $view->roles = ORM::factory('role')->find_all();
		if (Auth::instance()->logged_in()) {
			$user_id = Auth::instance()->get_user()->pk();
			$users = ORM::factory('User')->get_data($user_id);
			foreach ($users as $user) {
				$view->role_id = $user->role_id;
			}
		}
		$this->template->content = $view->render();
	}
} // End Welcome

