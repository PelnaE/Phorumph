<?php defined('SYSPATH') or die ('No direct script access!');

class Controller_Topic extends Controller_Template
{
    public function action_new()
    {
        $view = View::factory('topic/new');
        $category = new Model_Category();
        $category_id = $this->request->param('id');
        if (empty($category_id)) {
            $view->categories = $category->get_all_categories();
        }
        $this->template->content = $view->render();
    }
}

