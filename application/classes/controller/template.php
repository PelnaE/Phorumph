<?php defined("SYSPATH") or die ('No direct script access');

class Controller_Template extends Kohana_Controller_Template
{
	public $template;
	public function before()
	{
		$config = Kohana::$config->load('common');
		$this->template = $config->template_name;
		parent::before();
		if (Session::instance()->get('user_id')) {
			$user                  = new Model_User();
			$this->template->users    = $user->get_data(Session::instance()->get('user_id'));
			$this->template->users_levels       = $user->get_level(Session::instance()->get('user_id'));
		}
		$this->template->site_name = $config->site_name;
	}
}
