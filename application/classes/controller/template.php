<?php defined("SYSPATH") or die ('No direct script access');

class Controller_Template extends Kohana_Controller_Template
{
	public $template;
	public function before()
	{
		$config = Kohana::$config->load('common');
		$this->template = $config->template_name;
		parent::before();
		$this->template->site_name = $config->site_name;
	}
}
