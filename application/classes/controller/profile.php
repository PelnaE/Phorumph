<?php defined('SYSPATH') or die ('No direct script access!');

class Controller_Profile extends Controller_Template
{
	public $true = true;
	public function action_change_password()
	{
		$view = View::factory('profile/change_password');
		$user = new Model_User();
		$view->users = $user->get_data(Session::instance()->get('user_id'));
		$this->template->content = $view->render();
		if ($this->request->method() === Request::POST) {
			if (!Security::check($this->request->param('id'))) {
				throw new Exception("Bad token!");
			}
			$email = $this->request->post('email');
			$current_password = crypt($this->request->post('current_password'), 'generatedsalt');
			$password = $this->request->post('password');
			$password_again = $this->request->post('password_again');
			if ($password !== $password_again) {
				throw new Exception("Passwords must be identical!");
			}
			$password_from_db = $user->password_from_db(Session::instance()->get('user_id'), $current_password);
			if ($password_from_db !== $current_password) {
				throw new Exception("You have entered incorrect your current password.");
			}
			$password = crypt($password, 'generatedsalt');
			$change_password = $user->change_password($password, $email);
			if (!$change_password) {
				throw new Exception("Error with password's change!");
			}
			$this->request->redirect('/');
		}
	}
	public function action_upload_avatar()
	{
		$view = View::factory('profile/upload_avatar');
		$user = new Model_User();
		$this->template->content = $view->render();
		if ($this->request->method() === Request::POST) {
			if (!Security::check($this->request->param('id'))) {
				throw new Exception("Bad token!");
			}
			$user_id = Auth::instance()->get_user()->pk();
			$image = Validation::factory($_FILES)
			->rule('image', 'Upload::not_empty')
			->rule('image', 'Upload::type', array(':value', array('jpg', 'png', 'gif')));
			if ($image->check()) {
				Upload::save($image['image'],$user_id."_".$image['image']['name'], 'public/avatars');
				$picture = "http://localhost".URL::site('public/avatars')."/".$user_id."_".$image['image']['name'];
				$change_avatar = $user->change_avatar($user_id, $picture);
				if (!$change_avatar) {
					throw new Exception("Error with uploading avatar. \n $change_avatar");
				}
				$this->request->redirect('/');
			}
		}
	}

	public function action_delete_avatar()
	{
		if (!Security::check($this->request->param('id'))) {
			throw new Exception("Bad token!");
		}
		$user = new Model_User();
		$delete_avatar = $user->delete_avatar(Session::instance()->get('user_id'));
		if (!$delete_avatar) {
			throw new Exception("Error with deleting avatar.");
		}
		$this->request->redirect('profile/view/'. Session::instance()->get('user_id'));
	}

	public function action_change_signature()
	{
		$user = new Model_User();
		$view = View::factory('profile/change_signature');
		$view->users = $user->get_data(Session::instance()->get('user_id'));
		if ($this->request->method() === Request::POST) {
			if (!Security::check($this->request->param('id'))) {
				throw new Exception("Bad token!");
			}
			$new_signature = $this->request->post('signature');
			$update_signature = $user->change_signature($new_signature, Session::instance()->get('user_id'));
			if (!$update_signature) {
				throw new Exception('Signature could not be saved!');
			}
			$this->request->redirect('/');
		}
		$this->template->content = $view->render();
	}


	public function action_view()
	{
		$user_id = $this->request->param('id');
		if (empty($user_id)) {
			throw new Exception("User ID Must not be empty!");
		}
		$user = new Model_User();
		$view = View::factory('profile/view');
		$topic = new Model_Topic();
		$reply = new Model_Reply();
		$view->replies = $reply->get_replies_by_user_id(Session::instance()->get('user_id'));
		$view->topics = $topic->get_topics_by_user_id(Session::instance()->get('user_id'));
		$view->user = $user->where('id', '=', Auth::instance()->get_user()->pk())->find();
		$this->template->content = $view->render();
	}
}
