<?php

class Model_Roles_User extends ORM {
    public function get_last_role_id ($user_id)
    {
        return DB::select()
            ->from('roles_users')
            ->where('user_id', '=', $user_id)
            ->order_by('role_id', 'DESC')
            ->limit(1)
            ->as_object()
            ->execute();
    }
    public function delete_role ($role_id, $user_id)
    {
        return DB::delete('roles_users')
            ->where('role_id', '=', $role_id)
            ->and_where('user_id', '=', $user_id)
            ->execute();
    }
}

