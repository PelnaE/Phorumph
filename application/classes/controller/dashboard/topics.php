<?php defined('SYSPATH') or die ('No direct script access');

class Controller_Dashboard_Topics extends Controller_Template
{
    public function action_list()
    {
        $view = View::factory('dashboard/topics/list');
        $view->topics = ORM::factory('Topic')->find_all();
        $this->template->content = $view->render();
    }
    public function action_edit()
    {
        $view = View::factory('dashboard/topics/edit');
        $topic_id = $this->request->param('id');
        $view->topic = ORM::factory('Topic', array('topic_id' => $topic_id))->find();
        $this->template->content = $view->render();

        if ($this->request->method() === Request::POST) {
            $topic_title = $this->request->post('title');
            $topic_content = $this->request->post('content');
            $topic_id = $this->request->param('id');
            if (!Security::check($this->request->param('id2'))) {
                throw new Exception("Bad token!");
            }
            $topic = ORM::factory('topic');
            $data = array(
                'title' => $topic_title,
                'content' => $topic_content,
            );
            $update_topic = $topic->update_topic ($data, $topic_id);
            $this->request->redirect('dashboard/topics/list');
        }
    }
    public function action_delete_topic()
    {
        $topic_id = $this->request->param('id');
        if (!Security::check($this->request->param('id2'))) {
            throw new Exception ("Bad token!");
        }
        $topic = ORM::factory('topic');
        $delete_topic = $topic->delete_topic($topic_id);
        if (!$delete_topic) {
            throw new Exception ("Topic was unable to delete");
        }
        $this->request->redirect('dashboard/topics/list');
    }
}
