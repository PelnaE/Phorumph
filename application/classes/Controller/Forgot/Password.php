<?php defined('SYSPATH') or die ('No direct script access');

class Controller_Forgot_Password extends Controller_Template
{
	public function action_index()
	{
		$view = View::factory('forgot_password');
		$this->template->content = $view->render();
		if ($this->request->method() === Request::POST) {
			$email = $this->request->post('email');
			$user  = new Model_User();
			$password_recovery = new Model_Password_Recovery();
			$unique_email = $user->unique_email($email);
			if ($unique_email === true) {
				throw new Exception("Email is not correct!");
			}
			$view_for_message = View::factory('forgot_password/send_email');
			$user_id = $user->get_id($email);
			$hash = sha1(Security::token());
			$view_for_message->user_id = $user_id;
			$view_for_message->hash = $hash;
			$create_attemp = $password_recovery->create_attemp($email, $user_id, $hash);
			if (!$create_attemp) {
				throw new Exception("Cannot create attemp!");
			}
			Email::connect();
			$to = array($email);
			$from = array('user@localhost', 'admin');
			$subject = 'Password recovery';
			$message = $view_for_message->render();
			$send_email = Email::send($to,$from,$subject,$message,true);
			if (!$send_email) {
				throw new Exception("Cannot send email! \n $send_email");
			}
			$this->redirect('/');
		}
	}
	public function action_do()
	{
		$user_id = $this->request->param('id');
		$hash    = $this->request->param('id2');
		$password_recovery = new Model_Password_Recovery();
		$check_hash        = $password_recovery->check($user_id, $hash);
		if ($check_hash !== true) {
			throw new Exception("This hash is not a password recovery request!");
		}
		$view = View::factory('forgot_password/recovery');
		if ($this->request->method() === Request::POST) {
			if (!Security::check($this->request->post('csrf_secure'))) {
				throw new Exception("Bad token!");
			}
			$password = $this->request->post('password');
			$confirm  = $this->request->post('confirm');
			if ($password !== $confirm) {
				throw new Exception("Passwords did not match!");
			}
			$user     = new Model_User();
			$password = crypt($password, 'generatedsalt');
			$change_password = $user->recover_password($password, $user_id);
			if (!$change_password) {
				throw new Exception("Error with changing a password!");
			}
			$chmod_attemp = $password_recovery->chmod_attemp($hash);
			if (!$chmod_attemp) {
				throw new Exception("False");
			}
			$this->redirect('');
		}
		$this->template->content = $view->render();
	}
}
