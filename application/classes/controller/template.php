<?php defined("SYSPATH") or die ('No direct script access');

class Controller_Template extends Kohana_Controller_Template
{
	public $template;
	public function before()
	{
		$config = Kohana::$config->load('common');
		$this->template = $config->template_name;
		parent::before();
		if (Auth::instance()->logged_in()) {
			$user                  = new Model_User();
			$this->template->sidebar = View::factory('profile/sidebar')
			->set('users', $user->where('id', '=', Auth::instance()->get_user()->pk())->find())
			->set('users_levels', $user->get_level(Auth::instance()->get_user()->pk()));
		} else {
			$this->template->sidebar = View::factory('login');
		}
		$this->template->stylesheets = $config->stylesheets;
		$this->template->site_name = $config->site_name;
        if (Auth::instance()->logged_in()) {
            $user_id = Auth::instance()->get_user()->pk();
            $roles = ORM::factory('roles_user')->get_last_role_id($user_id);
            foreach ($roles as $role)
                if ($role->role_id == 1) {
                    if ($this->request->directory() == 'dashboard') {
                        $this->request->redirect('');
                    }
                    if ($this->request->uri() == 'dashboard') {
                        $this->request->redirect('');
                    }
                }
        } else {
            if ($this->request->directory() == 'dashboard') {
                $this->request->redirect('');
            }
            if ($this->request->uri() == 'dashboard') {
                $this->request->redirect('');
            }
        }

	}
}
