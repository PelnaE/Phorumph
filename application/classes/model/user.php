<?php defined('SYSPATH') or die ('No direct script access');

class Model_User extends Model_Auth_User
{
	protected $_table_name = 'users';

	protected $_has_many = array(
        		'roles'       => array('model' => 'role', 'through' => 'roles_users'),
	);
	static function is_username_taked($username)
	{
		return ! DB::select(array(DB::expr('COUNT(username)'), 'total'))
		->from('users')
		->where('username', '=', $username)
		->execute()
		->get('total');
	}
	static function unique_email($email)
	{
		return ! DB::select(array(DB::expr('COUNT(email)'), 'total'))
		->from('users')
		->where('email', '=', $email)
		->execute()
		->get('total');
	}
	public function id($username)
	{
		return DB::select()
		->from('users')
		->where('username', '=', $username)
		->execute()
		->get('id');
	}
	public function username_from_db($username)
	{
		return DB::select()
		->from('users')
		->where('username', '=', $username)
		->execute()
		->get('username');
	}
	public function password_from_db($user_id, $password)
	{
		return DB::select()
		->from('users')
		->where('id', '=', $user_id)
		->execute()
		->get('password');

	}
	public function get_data($user_id)
	{
		return DB::select()
		->from('users')
		->distinct('TRUE')
		->join('roles_users')
		->on('roles_users.user_id', '=', 'users.id')
		->where('users.id', '=', $user_id)
		->as_object()
		->execute();
	}
	public function change_password($password, $email)
	{
		return DB::update('users')
		->set(array('password' => $password))
		->where('email', '=', $email)
		->execute();
	}
	public function change_avatar($user_id, $url)
	{
		return DB::update('users')
		->set(array('picture' => $url))
		->where('id', '=', $user_id)
		->execute();
	}

	public function change_signature($signature, $user_id)
	{
		return DB::update('users')
		->set(array('signature' => $signature))
		->where('id', '=', $user_id)
		->execute();
	}

	public function delete_avatar($user_id)
	{
		return DB::update('users')
		->set(array('picture' => ''))
		->where('id', '=', $user_id)
		->execute();
	}

	public function get_id($email)
	{
		return DB::select('email', 'id')
		->from('users')
		->where('email', '=', $email)
		->execute()
		->get('id');
	}
	public function recover_password($password, $id)
	{
		return DB::update('users')
		->set(array('password' => $password))
		->where('id', '=', $id)
		->execute();
	}
	public function get_level($user_id)
	{
		return DB::select()
		->from('users')
		->join('roles_users')
		->on('roles_users.user_id', '=', 'users.id')
		->where('users.id', '=', $user_id)
		->as_object()
		->execute();
	}
    public function delete_user ($user_id)
    {
        return DB::delete('users')
            ->where('id', '=', $user_id)
            ->execute();
        return DB::delete('roles_user')
            ->where('user_id', '=', $user_id)
            ->execute();
    }
}
