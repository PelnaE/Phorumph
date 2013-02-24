<?php

defined('SYSPATH') or die('No direct script access');

class Controller_Register extends Controller_Template {

    public $true = true;

    public function action_index() {
        $view = View::factory('register');
        if ($this->request->method() === Request::POST) {
            if (!Security::check($this->request->param('id'))) {
                throw new Exception("Bad token!");
            }
            $post = Validation::factory($_POST)
                    ->rule('username', 'not_empty')
                    ->rule('username', 'Model_User::is_username_taked')
                    ->rule('email', 'not_empty')
                    ->rule('email', 'Model_User::unique_email')
                    ->rule('email', 'email')
                    ->rule('password', 'not_empty')
                    ->rule('password', 'min_length', array(':value', '8'))
                    ->rule('password_again', 'not_empty')
                    ->rule('password', 'matches', array(':validation', 'password', 'password_again'));

            if ($post->check()) {
                $user = new Model_User();
                $post = $this->request->post();
                $user->values($post)->save();
                // atrod role 'login'
                $loginRole = ORM::factory('role')->where('name', '=', 'login')->find();
                // pieliek klāt 'login' role litotājam
                $user->add('roles', $loginRole);


                $this->template->content = $view->bind('successful', $this->true);
            } else {
                $this->template->content = $view->bind('errors', $this->true);
            }
        }
        $this->template->content = $view->render();
    }

}
