<?php defined('SYSPATH') or die ('No direct script access');

class Model_Category extends ORM
{
	public function get_all_categories()
	{
		return DB::select()
		->from('categories')
		->distinct('TRUE')
		->join('categories_access')
		->on('categories_access.category_id', '=', 'categories.id')
		->order_by('categories.id', 'DESC')
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
}
