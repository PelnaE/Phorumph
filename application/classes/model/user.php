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
}
