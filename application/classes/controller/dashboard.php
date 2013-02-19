<?php defined('SYSPATH') or die('No direct script access');

class Controller_Dashboard extends Controller_Template
{
	public function action_index()
	{
		if (Auth::instance()->logged_in()) {
			$view = View::factory('dashboard');
			$view->user = ORM::factory('User')
			->where('id', '=', Auth::instance()->get_user()->pk())
			->find();
			$this->template->content = $view->render();
		} else {
			$this->request->redirect('.');
		}
	}
}
