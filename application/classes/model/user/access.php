<?php defined('SYSPATH') or die ('No direct script access');

class Model_User_Access extends Model
{
	public function get_level($user_id)
	{
		return DB::select()
		->from('user_accesses')
		->where('user_id', '=', $user_id)
		->execute();
	}
}
