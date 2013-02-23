<?php defined('SYSPATH') or die ('No direct script access!');

class Controller_Topic extends Controller_Template
{
    public function action_new()
    {
        if (Auth::instance()->logged_in()) {
            $view = View::factory('topic/new');
            $category = new Model_Category();
            $category_id = $this->request->param('id');
            $view->categories = $category->get_all_categories();
            $user_id = Auth::instance()->get_user()->pk();
            $users = ORM::factory('User')->get_data($user_id);
            foreach ($users as $user) {
                $view->role_id = $user->role_id;
            }
            $this->template->content = $view->render();
            if ($this->request->method() === Request::POST) {
                if (!Security::check($this->request->param('id'))) {
                    throw new Exception("Bad token!");
                }
                $title = $this->request->post('title');
                $category_id = $this->request->post('category_id');
                $author = $user_id;
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
        } else {
            $this->request->redirect('');
        }
    }

    public function action_view()
    {
        $view = View::factory('topic/view');
        $topic_id = $this->request->param('id');
        $topic    = new Model_Topic();
        $reply    = new Model_Reply();
        $view->replies = $reply->get($topic_id);
        $view->topics = $topic->get_topic_by_id($topic_id);
        $this->template->content = $view->render();
    }
    public function action_edit()
    {
        if (Auth::is_user_signed_in()) {
            $view = View::factory("topic/edit");
            $topic_id = $this->request->param('id');
            $topic    = new Model_Topic();
            $view->topics = $topic->get_topic_by_id($topic_id);
            $this->template->content = $view->render();
            if ($this->request->method() === Request::POST) {
                if (!Security::check($this->request->param('id2'))) {
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
                $this->request->redirect('topic/view/'.$topic_id);
            }
        } else {
            $this->request->redirect('');
        }
    }
    public function action_reply()
    {
        if (Auth::is_user_signed_in()) {
            if (!Security::check($this->request->param('id'))) {
                throw Exception("Bad token!");
            }
            $topic_id = $this->request->post('topic_id');
            $user_id  = $this->request->post('user_id');
            $content  = $this->request->post('content');
            $date     = time();
            if (empty($topic_id) or empty($user_id) or empty($content)) {
                throw new Exception("Topic ID, User ID or Content must not be empty!");
            }
            $reply      = new Model_Reply();
            $send_reply = $reply->send($topic_id, $user_id, $content, $date);
            if (!$send_reply) {
                throw new Exception("Fail with sending a reply!");
            }
            $this->request->redirect('topic/view/'.$topic_id);
        }
    }
    // Coming soon...
    public function action_edit_reply()
    {
        if (Auth::is_user_signed_in()) {
            $reply_id = $this->request->param('id');
            $reply    = new Model_Reply();
            $view = View::factory('topic/edit_reply');
            $view->replies           = $reply->get_reply($reply_id);
            $this->template->content = $view->render();
            if ($this->request->method() === Request::POST) {
                if (!Security::check($this->request->param('id2'))) {
                    throw new Exception("Bad token!");
                }
                $content = $this->request->post('content');
                $topic_id = $this->request->post('topic_id'); //Topic id for last param from redirect.
                if (empty($content)) {
                    throw new Exception("Content of your reply must not be empty!");
                }
                $reply = new Model_Reply();
                $reply_id = $this->request->param('id');
                $update_reply = $reply->update($content, $reply_id);
                if (!$update_reply) {
                    throw new Exception("Reply will not be updated");
                }
                $this->request->redirect('topic/view/'.$topic_id);
            }
        }
    }
}

