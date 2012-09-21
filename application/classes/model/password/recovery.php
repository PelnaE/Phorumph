<?php defined('SYSPATH') or die ('No direct script access!');

class Model_Password_Recovery extends Model
{
    public function create_attemp($email, $user_id, $hash)
    {
        return DB::insert('password_recoveries', array('user_email', 'user_id', 'hash', 'attemp'))
        ->values(array($email, $user_id, $hash, '0'))
        ->execute();
    }
    public function check($id, $hash)
    {
        return (bool) DB::select('id')
        ->from('password_recoveries')
        ->where('hash', '=', $hash)
        ->where('attemp', '=', '0')
        ->and_where('user_id', '=', $id)
        ->execute()
        ->get('id');
    }
    public function chmod_attemp($hash)
    {
        return DB::update('password_recoveries')
        ->set(array('attemp' => '1'))
        ->where('hash', '=', $hash)
        ->execute();
    }
}

