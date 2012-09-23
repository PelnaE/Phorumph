<?php defined('SYSPATH') or die ('No direct script acess!');

class Controller_Category extends Controller_Template
{
    public function action_index()
    {
        $category_id = $this->request->param('id');
        if (empty($category_id)) {
            throw new Exception("Category ID must not be empty!");
        }
        $topic    = new Model_Topic();
        $category = new Model_Category();
        $view     = View::factory('categories/main');
        $view->topics = $topic->get_topics_by_id($category_id);
        $view->category = $category->get_name($category_id);
        $this->template->content = $view->render();
    }
}

