<?php defined('SYSPATH') or die ('No direct script access');

class Auth
{
	static function is_user_signed_in()
	{
		$session = Session::instance()->get('user_id');
		$cookie  = Cookie::get('user_id');
		if ($cookie && !$session) {
			Session::instance()->set('user_id', $cookie);
			Request::current()->redirect('');

		} else if ($session) {
			return $session;
		}

		return false;
	}
}
