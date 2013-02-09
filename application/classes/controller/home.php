<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Home extends Controller_Template {

	public function action_index()
	{
		$view = View::factory('home');
		$category = new Model_Category();
		$view->categories = $category->get_all_categories();
		$user_id = Session::instance()->get('user_id');
		$user = new Model_User();
		$view->levels =  $user->get_data($user_id);
		$this->template->content = $view->render();
	}
} // End Welcome

