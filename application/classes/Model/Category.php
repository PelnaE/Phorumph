<?php defined('SYSPATH') or die ('No direct script access');

class Model_Category extends ORM
{
	protected $_table_name = 'categories';

	protected $_has_many = array(
        		'roles'       => array('model' => 'role', 'through' => 'roles_categories'),
	);
	public function get_all_categories()
	{
		return DB::select()
		->from('categories')
		->distinct('TRUE')
        ->group_by('id')
		->join('roles_categories')
		->on('roles_categories.category_id', '=', 'categories.id')
		->order_by('categories.id', 'DESC')
		->as_object()
		->execute();
	}
    public function get_category($id)
    {
        return DB::select()
        ->from('categories')
        ->join('roles_categories')
        ->on('roles_categories.category_id', '=', 'categories.id')
        ->group_by('roles_categories.category_id')
        ->where('categories.id', '=', $id)
        ->as_object()
        ->execute();
    }
    public function get_category_roles($id)
    {
        return DB::select()
        ->from('categories')
        ->join('roles_categories')
        ->on('roles_categories.category_id', '=', 'categories.id')
        ->where('categories.id', '=', $id)
        ->as_object()
        ->execute();
    }
	public function get_name($id)
	{
		return DB::select('name')
		->from('categories')
		->where('id', '=', $id)
		->execute()
		->get('name');
	}
	public function create_category(array $data)
	{
		return DB::insert('categories', array_keys($data))
		->values(array_values($data))
		->execute();
	}
    public function delete_category($category_id)
    {
        return DB::delete('categories')
            ->where('id', '=', $category_id)
            ->execute();
    }
}
