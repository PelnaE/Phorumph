<?php defined('SYSPATH') or die ('No direct script access!');

class Controller_Topic extends Controller_Template
{
    public function action_new()
    {
        $view = View::factory('topic/new');
        $category = new Model_Category();
        $category_id = $this->request->param('id');
        $view->categories = $category->get_all_categories();
        $this->template->content = $view->render();
        if ($this->request->method() === Request::POST) {
            $title = $this->request->post('title');
            $category_id = $this->request->post('category_id');
            $author = Session::instance()->get('user_id');
            $content = $this->request->post('content');
            $data    = array(
                'title' => $title,
                'category_id' => $category_id,
                'author_id' => $author,
                'content'   => $content,
                'published' => time(),
            );
            $topic = new Model_Topic();
            $publish_topic = $topic->publish($data);
            if (!$publish_topic) {
                throw new Exception("Cannot publish your topic!");
            }
        }
    }
    public function action_view()
    {
        $view = View::factory('topic/view');
        $topic_id = $this->request->param('id');
        $topic    = new Model_Topic();
        $view->topics = $topic->get_topic_by_id($topic_id);
        $this->template->content = $view->render();
    }
}

