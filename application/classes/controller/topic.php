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
            if (!Security::check($this->request->param('id'))) {
                throw new Exception("Bad token!");
            }
            $title = $this->request->post('title');
            $category_id = $this->request->post('category_id');
            $author = Session::instance()->get('user_id');
            $content = $this->request->post('content');
            if (
                empty($title) or
                empty($category_id) or
                empty($author) or
                empty($content)
            ) {
                throw new Exception("Fields cannot be empty!");
            }
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
            $this->request->redirect('category/index/'.$category_id);
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
    public function action_edit()
    {
        $view = View::factory("topic/edit");
        $topic_id = $this->request->param('id');
        $topic    = new Model_Topic();
        $view->topics = $topic->get_topic_by_id($topic_id);
        $this->template->content = $view->render();
        if ($this->request->method() === Request::POST) {
            if (!Security::check($this->request->param('id2')) {
                throw new Exception("Bad Token!");
            }
            $topic_title = $this->request->post('title');
            $topic_content = $this->request->post('content');
            $topic_edited = time();
            if (empty($topic_title) or empty($topic_content)) {
                throw new Exception("Title and Content must not be empty!");
            }
            $data = array(
                'title' => $topic_title,
                'content' => $topic_content,
            );
            $update_topic = $topic->update($data, $topic_id);
            if (!$update_topic) {
                throw new Exception("Error");
            }
            $this->request->redirect('');
        }
    }
}

