<?php defined('SYSPATH') or die ('No direct script access!');

class Controller_Dashboard_Users extends Controller_Template
{
	public function action_list()
	{
		$view = View::factory('dashboard/users/list');
		$user = ORM::factory('User');
		$view->users = $user->find_all();
		$this->template->content = $view->render();				
	}
}