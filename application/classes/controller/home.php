<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller_Template {

	public function action_index()
	{
		$view = View::factory('home');
		$category = new Model_Category();
		$view->categories = $category->get_all_categories();
		if (Auth::instance()->logged_in()) {
			$user_id = Auth::instance()->get_user()->pk();
		}
		$this->template->content = $view->render();
	}
} // End Welcome

