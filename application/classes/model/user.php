<?php defined('SYSPATH') or die ('No direct script access');

class Model_User extends Model
{
	public function create(array $data)
	{
		return DB::insert('users', array_keys($data))
		->values(array_values($data))
		->execute();
	}
	static function is_username_taked($username)
	{
		return ! DB::select(array(DB::expr('COUNT(username)'), 'total'))
		->from('users')
		->where('username', '=', $username)
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
		->where('id', '=', $user_id)
		->as_object()
		->execute();
	}
}
