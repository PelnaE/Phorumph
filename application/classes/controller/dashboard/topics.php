<?php defined('SYSPATH') or die ('No direct script access');

class Controller_Dashboard_Topics extends Controller_Template
{
    public function action_list()
    {
        $view = View::factory('dashboard/topics/list');
        $view->topics = ORM::factory('Topic')->find_all();
        $this->template->content = $view->render();
    }
}
