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
}

