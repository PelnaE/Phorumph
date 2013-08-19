<?php defined('SYSPATH') or die ('No direct script access');

class Model_Roles_Category extends ORM
{
    public function delete_category($role_id, $category_id)
    {
        return DB::delete('roles_categories')
            ->where('role_id', '=', $role_id)
            ->and_where('category_id', '=', $category_id)
            ->execute();
    }

}
